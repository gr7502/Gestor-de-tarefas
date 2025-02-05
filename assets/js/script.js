document.addEventListener("DOMContentLoaded", function () {
	const toggleBtn = document.querySelector(".toggle-btn");
	const closeBtn = document.querySelector(".close-btn");
	const sidebar = document.querySelector(".sidebar");
	const content = document.querySelector(".content");

	toggleBtn.addEventListener("click", function () {
		sidebar.classList.add("show");
		content.classList.add("shift");
		toggleBtn.style.opacity = "0"; // Suaviza o desaparecimento
		setTimeout(() => {
			toggleBtn.style.display = "none";
		}, 300);
	});

	// Função para fechar a sidebar e exibir o botão de menu com efeito
	closeBtn.addEventListener("click", function () {
		sidebar.classList.remove("show");
		content.classList.remove("shift");
		toggleBtn.style.display = "block";
		setTimeout(() => {
			toggleBtn.style.opacity = "1"; // Suaviza o reaparecimento
		}, 100);
	});

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
});
