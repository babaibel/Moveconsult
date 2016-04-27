$(document).ready(function(){
	$(window).resize(function(){
		if($(window).width()<=1024)
			$('#f_icone').css('top', '736px');
		else
			$('#f_icone').css('top', 0);
	});
	$(window).resize();

	function form(sel){
		$(window).resize(function(){
			var h = $(window).height();
			var w = $(window).width();

			if(sel=='#ajax_zapros')
				$(sel).css({'top': ((h/2)-341), 'left': ((w/2)-286)});
			else
				$(sel).css({'top': ((h/2)-318), 'left': ((w/2)-286)});
		});
		$('.form .close').click(function(){$(this).parent().fadeOut(); $("#form-bg").hide(); $('.wrapper, footer').removeClass('blured');});
	}
	
	function formSuccess(){
		var h = $(window).height();
		$('.form').height(75).css('top', ((h/2)-35));
	}

	$('.visual .btn-more').on('click', function(){
		var h = $(window).height();
		var w = $(window).width();
		var at = $(this).attr('href');

		if(at=='#'){
			$("#ajax_ex_z").fadeOut();
			$('.wrapper, footer').addClass('blured');
			$("#form-bg").fadeIn();
			$("#ajax_zapros").attr('style', '').css({'top': ((h/2)-381), 'left': ((w/2)-286)}).fadeIn(1000, function(){form("#ajax_zapros")});
			return false
		}
	});
	$('#zapros').on('click', function(){
		var h = $(window).height();
		var w = $(window).width();		

		
			$("#ajax_ex_z").fadeOut();
			$('.wrapper, footer').addClass('blured');
			$("#form-bg").fadeIn();
			$("#ajax_zapros").attr('style', '').css({'top': ((h/2)-381), 'left': ((w/2)-286)}).fadeIn(1000, function(){form("#ajax_zapros")});
			return false;
		
	});
	$('#ex_z').on('click', function(){
		var h = $(window).height();
		var w = $(window).width();

		$("#ajax_zapros").fadeOut();
		$('.wrapper, footer').addClass('blured');
		$("#form-bg").fadeIn();
		$("#ajax_ex_z").attr('style', '').css({'top': ((h/2)-358), 'left': ((w/2)-286)}).fadeIn(1000, function(){form("#ajax_ex_z")});
	});
	
	function formSend(){
		$('form[name="zapros"]').submit(function(e) {
			var dataform=$(this).serialize();
			var actionform=$(this).attr('action');
			var methodform=$(this).attr('method');
			ajax_request=$.ajax({
				type: methodform,
				url: actionform,
				data: dataform,
				dataType: "html",
				success: function(html)
				{
					$("#ajax_zapros").html(html);
					$('.jClever').jClever();
					formSend();
					$('.form .close').click(function(){$(this).parent().fadeOut(); $("#form-bg").hide(); $('.wrapper, footer').removeClass('blured');});
				}
			});
			return false;
		});
	}
	formSend();
	
	function formSendEx(){
		$('form[name="ex_z"]').submit(function(e) {
			var dataform=$(this).serialize();
			var actionform=$(this).attr('action');
			var methodform=$(this).attr('method');
			ajax_request=$.ajax({
				type: methodform,
				url: actionform,
				data: dataform,
				dataType: "html",
				success: function(html)
				{
					$("#ajax_ex_z").html(html);
					$('.jClever').jClever();
					formSendEx();
					$('.form .close').click(function(){$(this).parent().fadeOut(); $("#form-bg").hide(); $('.wrapper, footer').removeClass('blured');});
				}
			});
			return false;
		});
	}
	formSendEx();
});

function next_news(maxcount,countpage,datefilter) {
$.get(
	"/include/nextnews.php?countpage="+countpage+"&maxcount="+maxcount+"&date="+datefilter,
	$.proxy(
		function(data) {
				$("#ajax_next_news"+countpage).html(data);
		}
	)
);
$('#btn-show'+countpage).remove();
return false;
};

function nextPage(hreff){
	var hreff = hreff+"?ajax=Y";	
	$.get(
		hreff,
		$.proxy(
			function(data) {
					$("#ajax-main").html(data);
			}
		)
	);
	return false;
}		
$(document).ready(function(){
	
 	//$('form[name="insert"]').live('submit', function(e){
	//$('form[name="insert"] submit').click(function(e){	
    $(".bx-slider-services").bxSlider({        
        controls: true,
        auto: false,
        pager: false,
        minSlides: 3,
        maxSlides: 3,
        moveSlides: 1,
        slideMargin: 0,
        slideWidth: 313,
        touchEnabled: false,        
    });
    
	$('form[name="insert"]').submit(function(e) {
		var dataform=$(this).serialize();
		var actionform=$(this).attr('action');
		var methodform=$(this).attr('method');
		ajax_request=$.ajax({
			type: methodform,
			url: actionform,
			data: dataform,
			dataType: "html",
			success: function(html)
			{
				$("#ajax_ref_cont").html(html);
			}
		});
		return false;
	});
	
	$('form[name="iinsert"]').submit(function(e) {
	// получим форму
    //var form = $('form[name="iinsert"]');
	var form = $(this);
	var actionform=$(this).attr('action');
	var idform=$(this).attr('id');
			
	// обернем ее в IFrame - поступаем как при использовании практически любого jQuery плагина
    form.ajaxForm();
    // отправим форму - большинство параметров как у $.ajax()
    form.ajaxSubmit({
        url: actionform,
        success: function(data) {
		$("#"+idform).html(data);
        }
    });
		return false;
	});
	
	$('form[name="seminars"]').submit(function(e) {
	// получим форму
	var form = $(this);
	var actionform=$(this).attr('action');
	var idform=$(this).attr('id');
			
	// обернем ее в IFrame - поступаем как при использовании практически любого jQuery плагина
    form.ajaxForm();
    // отправим форму - большинство параметров как у $.ajax()
    form.ajaxSubmit({
        url: actionform,
        success: function(data) {
		$("#"+idform).html(data).attr('class', '');
		$('.seminars-form form[name="seminars"]').jClever();
		$('.jClever-element-select-list li:first').remove()
        }
    });
		return false;
	});
});

$(window).load(function(){
	/* update 17.02.2014 */
	(function itemHover(){
		$('.menu-box .item').mouseenter(function(){
			$(this).addClass('active').siblings().removeClass('active');
		})
	})();
	/* end update */
	(function initHorizontal(){
		$('div.gallery-horizontal').makeCircleGallery({
			interval : 3000, /* интервал вращения 1000 = 1секунда */
			speed : 500, /* скорость перемещения 1000 = 1секунда */
			gallery_holder : 'ul',
			gallery_item : 'li',
			btnNext : '.next',
			btnPrev : '.prev'
		});
	})();
	/*(function video() {
		$("#video , #video1 , #video2 , #video3").append('<video id="video-player" style="width:100%;" class="video-js vjs-default-skin" autoplay loop controls preload="auto" data-setup="{}"><source src="/video/video.mp4" type="video/mp4" /><source src="/video/video.m4v" type="video/m4v" /><source src="/video/video.ogv" type="video/ogv" /><source src="/video/video.webm" type="video/webm" /></video>');
		$(window).resize(function(){
			var _width = $(window).width();
			if ($(window).width() < 1087) {_width = 1087}
			$('#video , #video1 , #video2 , #video3').css({
				'width':_width,
				'height':'613px',
				'position':'absolute',
				'top':'0',
				'left':-(_width-960)/2+'px',
				'overflow':'hidden'
			});
			$('#video-player').css({
				'top':'50%',
				'margin-top':-$('video','#video').height()/2+'px',
				'position':'absolute',
				'left':'0'
			})
		}).trigger('resize');
	})();*/
	(function parallax() {
		var bg=$(".green-bg"),
			map=$(".content-frame.w100"),
			glass=$('.slide-image');
		$(".ptop,.pleft,.pright,.pbottom,.pshow").each(function(){
			var word=$(this);
			var delay=word.data().delay|| 0;
			var _top=word.offset().top;
			word.css("position","relative");
			if (word.hasClass("pleft")) {
				word.css("left",-$(document).width());
			}
			if(word.hasClass("pright")){
				word.css("left",$(document).width());
			}
			if(word.hasClass("ptop")){
				word.css("top",-word.height()*2);
			}
			if(word.hasClass("pbottom")){
				word.css("top",word.height()*2);
			}
			if(word.hasClass("pshow")){
				word.css("opacity",0);
			}
			$(window).scroll(handler);
			function handler() {
				if (_top>=$(window).scrollTop() && _top+word.height()<$(window).scrollTop()+$(window).height()+100) {
					word.delay(delay).animate({"left":0,"top":0,"opacity":1},800);
					$(window).off("scroll",handler);
				}
			}
			handler();
		});
		bg.css("top",bg.height());
		map.css("top",map.height());
		map.css("position","relative");
		/*$(window).scroll(function(){
			if (bg.offset().top-bg.height()+30<$(window).scrollTop()+$(window).height()) {
				bg.animate({"top":0},400);
			}
			if (map.offset().top-map.height()+60<$(window).scrollTop()+$(window).height()) {
				map.animate({"top":0},800);
			}
		});*/
	})();
})
$(function init(){
	(function animation (){
		$(window).scroll(function(){
			if (!$('.menu-box').size()) return;
			if ($(window).scrollTop()+$(window).height()/2 > $('.menu-box').offset().top) {
				$('.animation').each(function(){
					var _this = $(this);
					var _delay = _this.attr('data-delay')
					setTimeout(function(){
						_this.addClass('animate')
					}
					,_delay);
				})
			}
		});
	})();
	(function menuBox (){
		$('.menu-box .item').each(function(){
			var _main = $(this).closest('.menu'),
				_this = $(this);
			_this.mouseenter(function(){
				if ($('.block',_main).eq($(this).index()).is('.active')) return false;
				$('.block:visible',_main).stop(true,true).animate({opacity:0},200, function(){$(this).hide().removeClass('active')});
				$('.block',_main).eq($(this).index()).stop(true,true).show().css('opacity','0').animate({opacity:1},200, function(){$(this).addClass('active')})
			});
		});
	})();
	(function gallery() {
		$(".visual-box").fadeGallery({autoRotation:true});
		if (!$(".flipsnap").size())return;
		var flipsnap = Flipsnap('.flipsnap',{
			 distance: 940
		});
		var $next = $('.text-gallery .next').click(function(e) {
			flipsnap.toNext();
			e.preventDefault();
		});
		var $prev = $('.text-gallery .prev').click(function(e) {
			flipsnap.toPrev();
			e.preventDefault();
		});
		$prev.css("opacity",0);
		flipsnap.element.addEventListener('fspointmove', function(e) {
			if (!flipsnap.hasNext()) {
				$next.fadeTo(400,0);
			}else{
				$next.fadeTo(400,1);
			}
			if (!flipsnap.hasPrev()) {
				$prev.fadeTo(400,0);
			}else{
				$prev.fadeTo(400,1);
			}
		}, false);
	})();

	(function contactUs() {
		var contactForm=$(".contacts-form");
		$(".map-box .btn-write").click(function(e){ 
			contactForm.fadeIn(400);
			return false;
		});
		contactForm.find(".btn").click(function(e){
			contactForm.fadeOut(400);
			e.preventDefault();
			return false;
		});
	})();
	(function login() {
		var login=$(".panel.login");
		if (login.size()){
			$(".w1>header").css("position","relative");
		}
		$(".lang>li>a:last").click(function(e){
			login.fadeIn(400);
			e.preventDefault();
		});
		$(document).click(function(e){
			if (!$(e.target).closest(".login").size() && !$(e.target).closest(".lang").size()) {
				login.filter(":visible").fadeOut(400);
			}
		});
	})();
	(function vacancyAccordeon(){
		$('.vacancy .box').each(function(){
			if($(this).find(".box-in").size())
				$(this).prev().addClass('down');
		});
		$(".vacancy>li .heading .opener").click(function(e){
			if($(this).parent().next().find(".box-in").size()){
				$(this).parent().next().slideToggle(400,function() {
					$(this).parent().toggleClass("active");
				});
				$(this).closest("li").siblings(".active").find(".box").slideUp(400,function() {
					$(this).parent().removeClass("active");
				});
				e.preventDefault();
			}else{return false}
		}).next().click(function(e){
			if($(this).parent().next().find(".box-in").size()){
				$(this).parent().next().slideUp(400,function() {
					$(this).parent().removeClass("active");
				});
				e.preventDefault();
			}else{return false}
		});
	})();
	(function btnUp(){
		var btn=$('.btn-up');
		function scrollH(){
			if($(window).scrollTop()> $(window).height()){
				if(btn.is(':hidden')){
					btn.stop().fadeTo(400,1,scrollH);
				}
			}else{
				if (btn.is(':visible')&& !btn.is(':animated')) {
					btn.stop().fadeOut(400,scrollH);
				}
			}
		}
		btn.click(function(e){
			$('html,body').stop().animate({'scrollTop':'0'},400);
			e.preventDefault();
		});
		btn.hide();
		$(window).scroll(scrollH);
	})();
	(function MapInitialize(){
		if (!$("#map_canvas").size() || !$("#map_canvas2").size() || !$("#map_canvas3").size()) return;
		var map, map2, map3;
		$('#map-link').click(function(){
			$("#map_canvas").show();
			$("#map_canvas2").hide();
			$("#map_canvas3").hide();
			$("#btns-1").show();
			$("#btns-2").hide();
			$("#btns-3").hide();
		});
		$('#map-link2').click(function(){
			$("#map_canvas2").show();
			$("#map_canvas").hide();
			$("#map_canvas3").hide();
			$("#btns-2").show();
			$("#btns-1").hide();
			$("#btns-3").hide();
		});
		$('#map-link3').click(function(){
			$("#map_canvas3").show();
			$("#map_canvas").hide();
			$("#map_canvas2").hide();
			$("#btns-3").show();
			$("#btns-1").hide();
			$("#btns-2").hide();
		});
		var jbmap = new google.maps.LatLng(55.91286221, 37.72219598);
		var jbmap2 = new google.maps.LatLng(55.684392, 37.43761);
		var jbmap3 = new google.maps.LatLng(55.8069507, 37.5887144);
		/* 55.744736, 37.66398 */	

		var MY_MAPTYPE_ID = 'MapStyle';
		 
		var stylez =  [
			  {
				"featureType": "landscape.natural",
				"elementType": "geometry.fill",
				"stylers": [
				  { "color": "#d2d2d2" },
				]
			  },{
				"featureType": "landscape.man_made",
				"elementType": "geometry.fill",
				"stylers": [
				  //{ "color": "#000000" },
				  { "visibility": "on" },
				  { "saturation": -88 },
				  { "lightness": 0 }	
				]
			  },{
				"featureType": "water",
				"stylers": [
				  { "color": "#00009b" },
				  { "saturation": 0 }			  
				]
			  },{
				"featureType": "road.arterial",
				"elementType": "geometry",
				"stylers": [
				  { "color": "#ffffff" }
				]
			  },{
				"elementType": "labels.text.stroke",
				"stylers": [
				  { "visibility": "off" }
				]
			  },{
				"elementType": "labels.text",
				"stylers": [
				  { "color": "#000000" }
				]
			  },{
				"featureType": "road.local",
				"stylers": [
				  { "color": "#ffffff" }
				]
			  },{
				"featureType": "road.local",
				"elementType": "labels.text",
				"stylers": [
				  { "color": "#000000" }
				]
			  },{
				"featureType": "road.highway",
				"stylers": [
				  { "color": "#afafaf" },
				  { "lightness": 0 }
				]
			  },{
				"featureType": "road.highway",
				"elementType": "labels.text",
				"stylers": [
				  { "color": "#000000" },
				  { "lightness": 0 }
				]
			  },{
				"featureType": "transit.station.bus",
				"stylers": [
				  { "saturation": -57 }
				]
			  },{
				"featureType": "administrative.province",
				"stylers": [
				  { "visibility": "off" }
				]
			  },{
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [
				  { "color": "#d2d2d2" }
				]
			  },{
				"featureType": "road.highway",
				"elementType": "labels.icon",
				"stylers": [
				  { "visibility": "off" }
				]
			  }
		];

		var mapOptions = {
			backgroundColor: "#ffffff",
			zoom: 17,
			disableDefaultUI: true,
			draggable: true,
			scrollwheel: false,
			center: jbmap,
			/*zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.BOTTOM_CENTER
			},
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID],		    
			},*/
			mapTypeId: MY_MAPTYPE_ID
		};
		var mapOptions2 = {
			backgroundColor: "#ffffff",
			zoom: 17,
			disableDefaultUI: true,
			draggable: true,
			scrollwheel: false,
			center: jbmap2,
			/*zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.BOTTOM_CENTER
			},
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID],		    
			},*/
			mapTypeId: MY_MAPTYPE_ID
		};
		var mapOptions3 = {
			backgroundColor: "#ffffff",
			zoom: 17,
			disableDefaultUI: true,
			draggable: true,
			scrollwheel: false,
			center: jbmap3,
			/*zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.BOTTOM_CENTER
			},
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID],		    
			},*/
			mapTypeId: MY_MAPTYPE_ID
		};
		map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
			
		var image = new google.maps.MarkerImage('/bitrix/templates/moveconsulting_grotesk/images/navigator.png', new google.maps.Size(268, 187), new google.maps.Point(0, 0), new google.maps.Point(135,170));
		var marker = new google.maps.Marker({
			position: jbmap,
			map: map,
			icon: image
		});

		var styledMapOptions = {name: "MyStyle"};	
		var jayzMapType = new google.maps.StyledMapType(stylez, styledMapOptions);	
		map.mapTypes.set(MY_MAPTYPE_ID, jayzMapType);

		map2 = new google.maps.Map(document.getElementById("map_canvas2"), mapOptions2);
			var image2 = new google.maps.MarkerImage('/bitrix/templates/moveconsulting_grotesk/images/navigator.png', new google.maps.Size(268, 187), new google.maps.Point(0, 0), new google.maps.Point(135,170));
			var marker2 = new google.maps.Marker({
				position: jbmap2,
				map: map2,
				icon: image2
			});		
			var jayzMapType2 = new google.maps.StyledMapType(stylez, styledMapOptions);	
			map2.mapTypes.set(MY_MAPTYPE_ID, jayzMapType2);

		map3 = new google.maps.Map(document.getElementById("map_canvas3"), mapOptions3);
			var image3 = new google.maps.MarkerImage('/bitrix/templates/moveconsulting_grotesk/images/navigator.png', new google.maps.Size(268, 187), new google.maps.Point(0, 0), new google.maps.Point(135,170));
			var marker3 = new google.maps.Marker({
				position: jbmap3,
				map: map3,
				icon: image3
			});			
			var jayzMapType3 = new google.maps.StyledMapType(stylez, styledMapOptions);	
			map3.mapTypes.set(MY_MAPTYPE_ID, jayzMapType3);	


		$('.map-box #btns-1 .plus').click(function(){
			map.setZoom(map.getZoom()+1);
			if(map.getZoom()==3) $(this).show();
		});
		$('.map-box  #btns-1 .minus').click(function() {
			map.setZoom(map.getZoom()-1);
			if(map.getZoom()==2) $(this).hide();
		});
		$('.map-box #btns-2 .plus').click(function(){
			map2.setZoom(map.getZoom()+1);
			if(map2.getZoom()==3) $(this).show();
		});
		$('.map-box  #btns-2 .minus').click(function() {
			map2.setZoom(map.getZoom()-1);
			if(map2.getZoom()==2) $(this).hide();
		});
		$('.map-box #btns-3 .plus').click(function(){
			map3.setZoom(map.getZoom()+1);
			if(map3.getZoom()==3) $(this).show();
		});
		$('.map-box  #btns-3 .minus').click(function() {
			map3.setZoom(map.getZoom()-1);
			if(map3.getZoom()==2) $(this).hide();
		});
	})()
});
jQuery.fn.makeCircleGallery = function(o) {
	o = $.extend( {
		interval : 2000, /* интервал вращения 1000 = 1секунда */
		speed : 1000, /* скорость перемещения 1000 = 1секунда */
		gallery_holder : 'ul',
		gallery_item : 'li',
		btnNext : '.next',
		btnPrev : '.prev'
	}, o || {});
	return this.each(
		function() {
			var _phase = true,
				main_holder = $(this),
				mover = $(o.gallery_holder,main_holder),
				item = o.gallery_item,
				_interval = o.interval,
				_speed = o.speed,
				_btnNext = $(o.btnNext,main_holder),
				_btnPrev = $(o.btnPrev,main_holder);
			_btnPrev.click(function(){
				if (_phase) {
					_phase = false;
					oneStepMinus();
				}
				return false;
			});
			_btnNext.click(function(){
				if (_phase) {
					_phase = false;
					oneStepPlus();
				}
				return false;
			});
			function oneStepPlus () {
				var step = (main_holder.find(item+':first').outerWidth(true));
				mover.animate({marginLeft:step*(-1)}, _speed, function(){
					$(this).append($(this).find(item+':first'));
					$(this).css('margin-left','0');
					_phase = true;
				});
			};
			function oneStepMinus () {
				var step = (main_holder.find(item+':last').outerWidth(true));
				mover.css('margin-left',-step).prepend(mover.find(item+':last'));
				mover.animate({marginLeft:0}, _speed, function(){
					$(this).css('margin-left','0');
					_phase = true;
				});
			};
			main_holder.bind('mouseover',function(){
				if (_interval) {
					clearTimeout(t);
				}
			});
			main_holder.bind('mouseleave',function(){
				if (_interval) {
					t = setTimeout(oneStep, o.interval+_speed);
				}
			});
			if (_interval) {
				t = setTimeout(oneStep, o.interval+_speed);
			}
			function oneStep () {
				if (_phase) {
					_phase = false;
					var step = (main_holder.find(item+':first').outerWidth(true));
					mover.animate({
						marginLeft: step * (-1)
					}, _speed, function(){
						$(this).append($(this).find(item + ':first')).css('margin-left', '0');
						_phase = true;
					});
				}
				t = setTimeout(oneStep, o.interval+_speed);
			};
		});
};
jQuery.fn.fadeGallery = function(_options){
	var _options = jQuery.extend({
		slideElements:'.visual>li',
		pagerLinks:'.switcher>ul>li',
		btnNext:'a.next',
		btnPrev:'a.prev',
		btnPlayPause:'a.play-pause',
		pausedClass:'paused',
		playClass:'playing',
		activeClass:'active',
		pauseOnHover:true,
		autoRotation:false,
		autoHeight:false,
		switchTime:5000,
		duration:650,
		event:'click'
	},_options);

	return this.each(function(){
		var _this = jQuery(this);
		var _slides = jQuery(_options.slideElements, _this);
		var _pagerLinks = jQuery(_options.pagerLinks, _this);
		var _btnPrev = jQuery(_options.btnPrev, _this);
		var _btnNext = jQuery(_options.btnNext, _this);
		var _btnPlayPause = jQuery(_options.btnPlayPause, _this);
		var _pauseOnHover = _options.pauseOnHover;
		var _autoRotation = _options.autoRotation;
		var _activeClass = _options.activeClass;
		var _pausedClass = _options.pausedClass;
		var _playClass = _options.playClass;
		var _autoHeight = _options.autoHeight;
		var _duration = _options.duration;
		var _switchTime = _options.switchTime;
		var _controlEvent = _options.event;

		var _hover = false;
		var _prevIndex = 0;
		var _currentIndex = 0;
		var _slideCount = _slides.length;
		var _timer;
		if(!_slideCount) return;
		_slides.hide().eq(_currentIndex).show();
		if(_autoRotation) _this.removeClass(_pausedClass).addClass(_playClass);
		else _this.removeClass(_playClass).addClass(_pausedClass);

		if(_btnPrev.length) {
			_btnPrev.bind(_controlEvent,function(){
				prevSlide();
				return false;
			});
		}
		if(_btnNext.length) {
			_btnNext.bind(_controlEvent,function(){
				nextSlide();
				return false;
			});
		}
		if(_pagerLinks.length) {
			_pagerLinks.each(function(_ind){
				jQuery(this).bind(_controlEvent,function(){
					if(_currentIndex != _ind) {
						_prevIndex = _currentIndex;
						_currentIndex = _ind;
						switchSlide();
					}
					return false;
				});
			});
		}

		if(_btnPlayPause.length) {
			_btnPlayPause.bind(_controlEvent,function(){
				if(_this.hasClass(_pausedClass)) {
					_this.removeClass(_pausedClass).addClass(_playClass);
					_autoRotation = true;
					autoSlide();
				} else {
					if(_timer) clearRequestTimeout(_timer);
					_this.removeClass(_playClass).addClass(_pausedClass);
				}
				return false;
			});
		}

		function prevSlide() {
			_prevIndex = _currentIndex;
			if(_currentIndex > 0) _currentIndex--;
			else _currentIndex = _slideCount-1;
			switchSlide();
		}
		function nextSlide() {
			_prevIndex = _currentIndex;
			if(_currentIndex < _slideCount-1) _currentIndex++;
			else _currentIndex = 0;
			switchSlide();
		}
		function refreshStatus() {
			if(_pagerLinks.length) _pagerLinks.removeClass(_activeClass).eq(_currentIndex).addClass(_activeClass);
			_slides.eq(_prevIndex).removeClass(_activeClass);
			_slides.eq(_currentIndex).addClass(_activeClass);
		}
		function switchSlide() {
			_slides.stop(true,true);
			_slides.eq(_prevIndex).fadeOut(_duration);
			_slides.eq(_currentIndex).fadeIn(_duration);
			refreshStatus();
			autoSlide();
		}

		function autoSlide() {
			if(!_autoRotation || _hover) return;
			if(_timer) clearRequestTimeout(_timer);
			_timer = requestTimeout(nextSlide,_switchTime+_duration);
		}
		if(_pauseOnHover) {
			_this.hover(function(){
				_hover = true;
				if(_timer) clearRequestTimeout(_timer);
			},function(){
				_hover = false;
				autoSlide();
			});
		}
		refreshStatus();
		autoSlide();
	});
}
/*
 * Drop in replace functions for setTimeout() & setInterval() that
 * make use of requestAnimationFrame() for performance where available
 * http://www.joelambert.co.uk
 *
 * Copyright 2011, Joe Lambert.
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 */

// requestAnimationFrame() shim by Paul Irish
// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
window.requestAnimFrame = (function() {
	return  window.requestAnimationFrame   ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame    ||
			window.oRequestAnimationFrame      ||
			window.msRequestAnimationFrame     ||
			function(/* function */ callback, /* DOMElement */ element){
				window.setTimeout(callback, 1000 / 60);
			};
})();
/**
 * Behaves the same as setTimeout except uses requestAnimationFrame() where possible for better performance
 * @param {function} fn The callback function
 * @param {int} delay The delay in milliseconds
 */

window.requestTimeout = function(fn, delay) {
	if( !window.requestAnimationFrame      	&&
		!window.webkitRequestAnimationFrame &&
		!window.mozRequestAnimationFrame    &&
		!window.oRequestAnimationFrame      &&
		!window.msRequestAnimationFrame)
			return window.setTimeout(fn, delay);

	var start = new Date().getTime(),
		handle = new Object();

	function loop(){
		var current = new Date().getTime(),
			delta = current - start;

		delta >= delay ? fn.call() : handle.value = requestAnimFrame(loop);
	};

	handle.value = requestAnimFrame(loop);
	return handle;
};

/**
 * Behaves the same as clearInterval except uses cancelRequestAnimationFrame() where possible for better performance
 * @param {int|object} fn The callback function
 */
window.clearRequestTimeout = function(handle) {
    window.cancelAnimationFrame ? window.cancelAnimationFrame(handle.value) :
    window.webkitCancelRequestAnimationFrame ? window.webkitCancelRequestAnimationFrame(handle.value)	:
    window.mozCancelRequestAnimationFrame ? window.mozCancelRequestAnimationFrame(handle.value) :
    window.oCancelRequestAnimationFrame	? window.oCancelRequestAnimationFrame(handle.value) :
    window.msCancelRequestAnimationFrame ? msCancelRequestAnimationFrame(handle.value) :
    clearTimeout(handle);
};