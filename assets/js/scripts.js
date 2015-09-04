function onResize(){
	$('.featured-recipe div').height('auto');
	var elementHeights = $('.featured-recipe div').map(function() {
		return $(this).height();
	}).get();
	var maxHeight = Math.max.apply(null, elementHeights);
	$('.featured-recipe div').height(maxHeight);
}


// detect useragent + platform // only when absolutely necessary
var b = document.documentElement;
	b.className = b.className.replace('no-js', 'js');
	b.setAttribute("data-useragent", navigator.userAgent.toLowerCase());
	b.setAttribute("data-platform", navigator.platform.toLowerCase());

var $html = $('html');
var ua = ( $html.data('useragent') ),
	pf = ( $html.data('platform') );

function is(string){
	return ua.indexOf(string) > -1
}

var browser = {
	isFirefox : is('firefox'),
	isSafari  : is('applewebkit'),
	isIE 	  : is('msie') || is('trident/7.0'),
	isIE7 	  : is('msie 7.0'),
	isIE8 	  : is('msie 8.0'),
	isIE9 	  : is('msie 9.0'),
	isIE11    : is('rv:11') || is('trident/7.0'),
	isChrome  : is('chrome'),
	isWin7    : is('windows nt 6.1'),
	isWin8    : is('windows nt 6.2'),
	isWindows : pf.indexOf('win32') > -1,
	isIpad    : is('ipad'),
	isAndroid : is('android')
}

$(document).ready(function() {

	var timer;
	$(window).bind('resize', function(){
		if($(window).width() > 660) {
			timer && clearTimeout(timer);
			timer = setTimeout(onResize, 100);
		}
	});	

 	// FastClick
	FastClick.attach(document.body);

	// init mmenu
	$("#mmenu").mmenu({
		searchfield: true
	}, {
		// configuration
	});

	$('#menu-main-menu > li').hoverIntent(
		function(){
			if($(this).is(':not(:first-child)')) {
				$(this).addClass('hovered');
				$('#mask').fadeIn();
			}
		},
		function(){
			$(this).removeClass('hovered');
			var h=0;
			$('#menu-main-menu > li a').each(function(){
				if($(this).is(':hover') && $(this).parent('li').not(':first-child')) {
					h++;
				} 
			});
			if(h==0) {
				$('#mask').fadeOut();
			}
		}
	);
	var zindex = 20;
	$('#menu-main-menu > li ul li').each(function(i){
		$(this).css('z-index', zindex-i);
	});

});

$(window).load(function(){

	$('#slider').css('visibility','visible');
	
	if($(window).width() > 660) {
		var elementHeights = $('.featured-recipe div').map(function() {
			return $(this).height();
		}).get();
		var maxHeight = Math.max.apply(null, elementHeights);
		$('.featured-recipe div').height(maxHeight);
	}
	
});
