const urlEvent = `${window.location.href}/event-source`;
var calendar;
document.addEventListener("DOMContentLoaded", function () {
	var calendarEl = document.getElementById("calendar");
	calendar = new FullCalendar.Calendar(calendarEl, {
		displayEventTime: true,
		initialView: "dayGridMonth",
		events: urlEvent,
		locale: "id",
		columnFormat: {
			month: "dddd",
		},
		eventDidMount: function (info) {
			console.log(info.el);
			info.el.querySelector(".fc-event-title").innerHTML = info.event.title;
		},
		eventClick: function (info) {
			$.ajax({
				url: `./jadwal/get/${info.event.id}`,
				type: "GET",
				dataType: "json",
				beforeSend: function () {},
			}).done(function (response) {
				if (response.status_code !== 200) {
					pesan({ text: response.message });
					return;
				}
				const data = response.data;
				const splitJam = data.jam_range.split("-");
				$("#modal-header-edit").attr(
					"style",
					`background:${info.event.backgroundColor} !important`
				);
				$("#btn-edit").attr(
					"style",
					`background:${info.event.backgroundColor}`
				);
				$("#Enama_petugas").val(data.nama_petugas);
				$("#Eid_jadwal").val(data.id);
				$("#Ejadwal").flatpickr({
					static: true,
					altInput: true,
					altFormat: "j F Y",
					dateFormat: "Y-m-d",
					defaultDate: data.jadwal,
				});
				$("#Ejadwal").val(data.jadwal);
				$("#Ejam_awal").flatpickr({
					static: true,
					enableTime: true,
					noCalendar: true,
					dateFormat: "H:i",
					time_24hr: true,
					defaultDate: splitJam[0],
				});
				$("#Ejam_akhir").flatpickr({
					static: true,
					enableTime: true,
					noCalendar: true,
					dateFormat: "H:i",
					time_24hr: true,
					defaultDate: splitJam[1],
				});
				$("#Etotal_disinfektan").val(data.total_disinfektan);
				$("#modalEdit").modal("show");
			});
		},
	});
	calendar.render();

	$(".fc-today-button").addClass("d-none");
	$(".fc-prev-button").addClass(["bg-primary","no-border"]);
	$(".fc-next-button").addClass(["bg-primary","no-border"]);
	const header = $(".fc-header-toolbar.fc-toolbar > .fc-toolbar-chunk").eq(2);
	header.addClass("d-flex");
	header.append($('#wrapper-atur-jadwal').html());
});

$("input[name=jadwal]").flatpickr({
	static: true,
	altInput: true,
	altFormat: "j F Y",
	dateFormat: "Y-m-d",
	
});

$(".timepicker").flatpickr({
	static: true,
	enableTime: true,
	noCalendar: true,
	dateFormat: "H:i",
	time_24hr: true,
});

$("#add-jadwal").validate({
	rules: {
		nama_kegiatan: "required",
		jadwal: "required",
		jam_awal: "required",
		jam_akhir: "required",
	},
	messages: {
		nama_kegiatan: "Nama kegiatan harus diisi",
		jadwal: "Tanggal harus diisi",
		jam_awal: "Jam Awal harus diisi",
		jam_akhir: "Jam Akhir harus diisi",
	},
});
$("#add-jadwal").submit(function (evt) {
	evt.preventDefault(evt);
	if(!$(this).valid()) return;
	const data = new FormData(this);
	$.ajax({
		type: "POST",
		processData: false,
		contentType: false,
		url: "./jadwal/store",
		data: data,
		dataType: "json",
		beforeSend: function () {},
	}).done(function (response) {
		pesan({ text: response.message });
		$('input').val('');	
		if(response.status_code !== 201) return;

		calendar.refetchEvents();
	});
});

$("#edit-jadwal").validate({
	rules: {
		nama_kegiatan: "required",
		jadwal: "required",
		jam_awal: "required",
		jam_akhir: "required",
		total_disinfektan: "required",
	},
	messages: {
		nama_kegiatan: "Nama kegiatan harus diisi",
		jadwal: "Tanggal harus diisi",
		jam_awal: "Jam Awal harus diisi",
		jam_akhir: "Jam Akhir harus diisi",
		total_disinfektan: "Total Penyemprotan harus diisi",
	},
});

$("#edit-jadwal").submit(function(evt){
	evt.preventDefault(evt);
	if (!$(this).valid()) return;
	const data = new FormData(this);
	$.ajax({
		type: "POST",
		processData: false,
		contentType: false,
		url: "./jadwal/edit-store",
		data: data,
		dataType: "json",
		beforeSend: function () {},
	}).done(function (response) {
		pesan({ text: response.message });
		$("input").val("");
		if (response.status_code !== 201) return;
		$("#modalEdit").modal("hide");

		calendar.refetchEvents();
	});

});

$("#btn-hapus").click(function (evt) {
	evt.preventDefault();
	const namaPetugas = $("#Enama_petugas").val();
	const confirmation = confirm(`Apakah anda yakin ingin menghapus jadwal dengan petugas ${namaPetugas} ? `)
	if(!confirmation) return;
	const id = $("#Eid_jadwal").val();
	const data = { id : id};
	$.ajax({
		type: "POST",
		url: "./jadwal/delete-store",
		data: data,
		dataType: "json",
		beforeSend: function () {},
	}).done(function (response) {
		pesan({ text: response.message });
		$("input").val("");
		if (response.status_code !== 201) return;
		$("#modalEdit").modal("hide");

		calendar.refetchEvents();
	});
});
