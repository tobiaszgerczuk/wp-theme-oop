function calculate_offset() {
	if ( window.innerWidth > 1192 ) {
		return ( ( window.innerWidth - 1192 ) / 2 ) + 4;
	} else {
		return 10;
	}
}

let featured_courses = new Swiper('.featured-courses > .swiper', {
	spaceBetween: 8,
	freeMode: false,
	grabCursor: true,
	mousewheel: {
		forceToAxis: true
	},
	slidesPerView: 1.1,
	slidesPerGroup: 1,
	slidesOffsetBefore: 0,
	slidesOffsetAfter: 0,
	centeredSlides: true,
	loop: true,
	pagination: {
		el: ".swiper-pagination",
		dynamicBullets: false,
		clickable: true,
	},
	breakpoints: {
		576: {
			slidesPerView: 2,
			spaceBetween: 8,
			centeredSlides: true,
			loopAdditionalSlides: 2,
		},
		768: {
			slidesPerView: 3,
			spaceBetween: 8,
			centeredSlides: true,
			loopAdditionalSlides: 2,
		},
		992: {
			slidesPerView: 3.5,
			slidesPerGroup: 2,
			spaceBetween: 32,
			centeredSlides: true,
			loopAdditionalSlides: 4,
		},
		1192: {
			slidesPerView: 2.5,
			slidesPerGroup: 3,
			spaceBetween: 32,
			slidesOffsetBefore: calculate_offset(),
			slidesOffsetAfter: 32,
			centeredSlides: false,
			loop: false,
		},
		1440: {
			slidesPerView: 3.5,
			slidesPerGroup: 4,
			spaceBetween: 32,
			slidesOffsetBefore: calculate_offset(),
			slidesOffsetAfter: 32,
			centeredSlides: false,
			loop: false,
		},
		1900: {
			slidesPerView: 4.5,
			slidesPerGroup: 5,
			spaceBetween: 32,
			slidesOffsetBefore: calculate_offset(),
			slidesOffsetAfter: 32,
			centeredSlides: false,
			loop: false,
		}
	},
	on: {
		beforeResize: function( swiper ) {
			swiper.params.slidesOffsetBefore = calculate_offset();
			swiper.params.slidesOffsetAfter  = calculate_offset();
		},
	}
});