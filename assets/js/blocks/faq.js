window.onload = function () {
	const faq = document.getElementsByClassName("faq-btn");
	let i;

	for (i = 0; i < faq.length; i++) {
		faq[i].addEventListener("click", function () {
			const panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
				panel.classList.remove("open");
				this.setAttribute('aria-expanded', "false")
			} else {
				let active = document.querySelectorAll(".faq-btn.active");
				for (let j = 0; j < active.length; j++) {
					active[j].classList.remove("active");
					active[j].setAttribute('aria-expanded', "false")
					active[j].nextElementSibling.style.maxHeight = null;
					active[j].nextElementSibling.classList.remove("open");
				}
				panel.style.maxHeight = panel.scrollHeight + "px";
				panel.classList.add("open");
				this.setAttribute('aria-expanded', "true")
			}
			this.classList.toggle("active");

		});
	}
};