$(document).ready(function () {
	$("#cpf").mask("000.000.000-00", { reverse: true });
	$("#email").on("blur", function () {
		let email = $(this).val();
		if (!email.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
			alert("E-mail inválido!");
			$(this).val("");
		}
	});
});
