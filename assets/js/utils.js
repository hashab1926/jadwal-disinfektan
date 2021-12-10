function pesan(options){

	Snackbar.show({
		pos: 'top-center',
		text: options.text,
		actionText: options.action || "OKE",
	});
}

function loading(options){
	return `
	<div class="d-flex flex-column ${options.center ? 'align-items-center' : ''}">
		<div class="spinner-border" style="width:${options.width}; height:${options.height};" role="status">
			<span class="sr-only"></span>
		</div>
		<div class='margin-top-2'>${options.text || ""}</div>
	</div>

	`;
}
