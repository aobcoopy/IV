(function ($) {
	"use strict";
	[].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
		new SelectFx(el);
	});
	$('.parallax').parallax("50%", 0.2);
	$('.beactive').addClass('active');
	$('.beactive').removeClass('beactive');
	$('.mg-booking-form > ul > li:nth-child(1)').click(function () {
		if ($('.mg-booking-form > ul > li:nth-child(1)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(1)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(2)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(2)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(3)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(3)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
		}
	});
	$('.mg-booking-form > ul > li:nth-child(2)').click(function () {
		$('.mg-booking-form > ul > li:nth-child(1)').addClass('mg-step-done');
		if ($('.mg-booking-form > ul > li:nth-child(2)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(2)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(3)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(3)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
		}
	});
	$('.mg-booking-form > ul > li:nth-child(3)').click(function () {
		$('.mg-booking-form > ul > li:nth-child(1)').addClass('mg-step-done');
		$('.mg-booking-form > ul > li:nth-child(2)').addClass('mg-step-done');
		if ($('.mg-booking-form > ul > li:nth-child(3)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(3)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
		}
	});
	$('.mg-booking-form > ul > li:nth-child(4)').click(function () {
		$('.mg-booking-form > ul > li:nth-child(1)').addClass('mg-step-done');
		$('.mg-booking-form > ul > li:nth-child(2)').addClass('mg-step-done');
		$('.mg-booking-form > ul > li:nth-child(3)').addClass('mg-step-done');
		if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
		}
	});
	$('.btn-next-tab').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		$('html, body').animate({
			scrollTop: $(".mg-booking-form").offset().top - 100
		}, 300);
		$('a[href="' + $(this).attr('href') + '"]').parents('li').trigger('click');
		$('.mg-booking-form > ul > li.active').removeClass('active');
		$('a[href="' + $(this).attr('href') + '"]').parents('li').addClass('active');
	});
	$('.btn-prev-tab').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		$('html, body').animate({
			scrollTop: $(".mg-booking-form").offset().top - 100
		}, 300);
		$('a[href="' + $(this).attr('href') + '"]').parents('li').trigger('click');
		$('.mg-booking-form > ul > li.active').removeClass('active');
		$('a[href="' + $(this).attr('href') + '"]').parents('li').addClass('active');
	});
	$('.mg-search-box-trigger').click(function () {
		var sbox = $(this).next();
		$(this).find('i').toggleClass('fa-times');
		sbox.toggleClass('mg-sb-active');
		return false;
	});
	if ($(window).width() >= 768) {
		$('.dropdown').hover(function () {
			$(this).addClass('open');
		}, function () {
			$(this).removeClass('open');
		});
	}
	$(window).resize(function () {
		if ($(window).width() >= 768) {
			$('.dropdown').hover(function () {
				$(this).addClass('open');
			}, function () {
				$(this).removeClass('open');
			});
		}
	});
	/*$("#mg-testimonial-slider").owlCarousel({
		navigation: true,
		singleItem: true,
		pagination: false,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		transitionStyle: "backSlide"
	});
	$("#mg-part-logos").owlCarousel({
		items: 3,
		itemsDesktop: [1199, 3],
		navigation: true,
		pagination: false,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
	});
	$("#mg-part-logos-full").owlCarousel({
		items: 5,
		navigation: true,
		pagination: false,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
	});
	$(".mg-post-images-slider").owlCarousel({
		singleItem: true,
		navigation: true,
		pagination: false,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
	});*/
	/*var sync1 = $("#mg-gallery");
	var sync2 = $("#mg-gallery-thumb");*/
	/*sync1.owlCarousel({
		navigation: true,
		singleItem: true,
		pagination: false,
		afterAction: syncPosition,
		navigationText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>'],
	});
	sync2.owlCarousel({
		items: 3,
		itemsDesktop: [1199, 3],
		itemsDesktopSmall: [979, 3],
		itemsTablet: [768, 3],
		itemsMobile: [479, 3],
		navigation: false,
		pagination: false,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		afterInit: function (el) {
			el.find(".owl-item").eq(0).addClass("synced");
		}
	});
*/
	/*function syncPosition(el) {
		var current = this.currentItem;
		$("#mg-gallery-thumb").find(".owl-item").removeClass("synced").eq(current).addClass("synced")
		if ($("#mg-gallery-thumb").data("owlCarousel") !== undefined) {
			center(current)
		}
	}
	sync2.on("click", ".owl-item", function (e) {
		e.preventDefault();
		var number = $(this).data("owlItem");
		sync1.trigger("owl.goTo", number);
	});
*/
	/*function center(number) {
		var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
		var num = number;
		var found = false;
		for (var i in sync2visible) {
			if (num === sync2visible[i]) {
				var found = true;
			}
		}
		if (found === false) {
			if (num > sync2visible[sync2visible.length - 1]) {
				sync2.trigger("owl.goTo", num - sync2visible.length + 2)
			} else {
				if (num - 1 === -1) {
					num = 0;
				}
				sync2.trigger("owl.goTo", num);
			}
		} else if (num === sync2visible[sync2visible.length - 1]) {
			sync2.trigger("owl.goTo", sync2visible[1])
		} else if (num === sync2visible[0]) {
			sync2.trigger("owl.goTo", num - 1)
		}
	}*/
	/*$('.input-group.mg-check-in').datepicker({
		startDate: "dateToday",
		autoclose: true
	});*/
	/*$('.input-group.mg-check-in').on('hide', function (e) {
		if (e.dates.length) {
			var strDate = e.date;
			strDate.setDate(strDate.getDate() + 1);
			$('.mg-check-out').datepicker('setStartDate', strDate);
		}
		$(e.currentTarget).removeClass('focus');
	});*/
	$('.input-group.mg-check-in').on('show', function (e) {
		$(e.currentTarget).addClass('focus');
	});
	$('.input-group.mg-check-out').on('show', function (e) {
		$(e.currentTarget).addClass('focus');
	});
	$('.input-group.mg-check-out').on('hide', function (e) {
		$(e.currentTarget).removeClass('focus');
	});
	/*$('.input-group.mg-check-in').on('changeDate', function (e) {
		if (e.dates.length) {
			var inDate = e.date,
				outDate = $('.mg-check-out').datepicker('getDate');
			if (outDate && inDate >= outDate) {
				$('.mg-check-out').datepicker('clearDates');
			}
		} else {
			$('.mg-check-out').datepicker('clearDates');
		}
	});*/
	/*$('.input-group.mg-check-out').datepicker({
		startDate: "dateToday",
		autoclose: true
	});*/
	$(window).ready(function () {
		sticky_check(this);
	});
	$(window).scroll(function () {
		sticky_check(this);
	});
	$(window).resize(function () {
		sticky_check(this);
	});

	function sticky_check($this) {
		if ($(window).width() >= 767) {
			if ($($this).scrollTop() > 150) {
				if (!$('.sticky-on-fixed').length && !$('.header.sticky').hasClass('transp')) {
					$('body').prepend('<div class="sticky-on-fixed" style="height:' + $('.header.sticky').height() + 'px"></div>');
				};
				$('.header.sticky').addClass("sticky-on");
			} else {
				$('.header.sticky').removeClass("sticky-on");
				$('.sticky-on-fixed').remove();
			}
		} else {
			$('.header.sticky').removeClass("sticky-on");
			$('.sticky-on-fixed').remove();
		}
	}
	$('#mg-star-position').on('starrr:change', function (e, value) {
		$('#mg-star-position-input').val(value);
	});
	$('#mg-star-comfort').on('starrr:change', function (e, value) {
		$('#mg-star-comfort-input').val(value);
	});
	$('#mg-star-price').on('starrr:change', function (e, value) {
		$('#mg-star-price-input').val(value);
	});
	$('#mg-star-quality').on('starrr:change', function (e, value) {
		$('#mg-star-quality-input').val(value);
	});
	/*$('.mg-gallery-item a').nivoLightbox({
		effect: 'fadeScale'
	});*/
	if ($('#mg-map').length) {
		var map = new GMaps({
			el: '#mg-map',
			lat: -37.81792,
			lng: 144.96506,
			zoom: 17
		});
		map.addMarker({
			lat: -37.81792,
			lng: 144.96506,
			title: 'Map',
			infoWindow: {
				content: '<strong>Envato</strong><br>Level 13, 2 Elizabeth St, Melbourne<br>Victoria 3000 Australia'
			}
		});
	}
})(jQuery);
/*$(window).load(function () {
	var $grid = $('#mg-grid'),
		$sizer = $grid.find('.shuffle__sizer'),
		$filterType = $('#mg-filter input[name="filter"]');
	$grid.shuffle({
		itemSelector: '.mg-gallery-item',
		sizer: $sizer
	});
	$grid.shuffle('shuffle', $('#mg-filter input[name="filter"]:checked').val());
	$('label.btn-main').removeClass('btn-main');
	$('input[name="filter"]:checked').parent().addClass('btn-main');
	$filterType.change(function (e) {
		var group = $('#mg-filter input[name="filter"]:checked').val();
		$grid.shuffle('shuffle', group);
		$('label.btn-main').removeClass('btn-main');
		$('input[name="filter"]:checked').parent().addClass('btn-main');
	});
});*/
/*$(window).load(function () {
	$('.preloader').fadeOut("slow");
});*/

function showLoader(loaderID) {
  var x = document.getElementById(loaderID);
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
} 
