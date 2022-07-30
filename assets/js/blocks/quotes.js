var quotes = new Swiper(".mySwiper", {
	spaceBetween: 0,
	loop: true,
	speed: 20,
	autoplay: {
		enabled: true,
		delay: 8000,
	},
	pagination: {
		el: ".swiper-pagination",
		dynamicBullets: false,
		clickable: true,
	},

	slidesPerView: 1,
	slidesPerGroup: 1,
});