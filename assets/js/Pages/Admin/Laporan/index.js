$("#cetak").flatpickr({
	mode: "range",
	static: true,
	altInput: true,
	altFormat: "j F Y",
	dateFormat: "Y-m-d",
});


$("#cari").click(function(evt){
	const range = $("#cetak").val();
	if(!range){
		alert("Silahkan pilih tanggal");
		return;
	}

	$.ajax({
		url : `./laporan/get?range=${range}`,
		type : "GET",
		dataType : "json",
		beforeSend : function(){
			$("#loading").html(
				loading({
					width: "5rem",
					height: "5rem",
					text: "Sedang Memproses",
					center: true,
				})
			);
		}
	}).done(function(response){
		$("#loading").html("");
		$("#toggleTable").addClass("d-none");
		if(response.status_code !== 200){
			$("#loading").html(`<div class='text-center'><h3>${response.message}</h3></div>`);
			return;
		}
		$("#toggleTable").removeClass("d-none");
		loadLaporan(response.data);
	})
})

function loadLaporan(data){
	let html = "";
	data.forEach((item,key) => {
		html += `
			<tr>
				<td class='text-center'>${key+1}</td>
				<td>${item.nama_petugas}</td>
				<td>${item.jadwal} jam ${item.jam_range}</td>
				<td>${item.total_disinfektan} kali</td>
			</tr>
		`;
	})
	$("#show-result").html(html);
}

function printLaporan(){
	const range = $("#cetak").val();
	if(!range){
		alert("Silahkan pilih tanggal");
		return;
	}
	window.open(`${window.location.href}/download?range=${range}`, "_blank");
}
