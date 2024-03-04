const slider = document.querySelector('.swiper');

let mySwiper = new Swiper(slider, {
	slidesPerView: 3,
	spaceBetween: 40,
	pagination: {
		el: '.swiper-pagination',
		type: 'fraction',
		clickable: true,
	},
	breakpoints: {
        310: {
            slidesPerView: 1,
        },
		768: {
            slidesPerView: 2,
        },
        993: {
            slidesPerView: 3,
        },
        1400: {
            slidesPerView: 3,
        },
    },
	autoplay: {
		delay: 4500
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
})


