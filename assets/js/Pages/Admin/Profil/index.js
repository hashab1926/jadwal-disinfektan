$("#update-profil").submit(function(evt){
	evt.preventDefault(evt);

	const data = new FormData(this);
	$.ajax({
		type: "POST",
		processData: false,
		contentType: false,
		url: "./profil-saya/store",
		data: data,
		dataType: "json",
		beforeSend: function () {},
	}).done(function (response) {
		pesan({ text: response.message });
		if (response.status_code !== 200) return;
		setTimeout(() =>{

			location.reload();
		},1000)
	});
});
