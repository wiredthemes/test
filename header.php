<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title><?php bloginfo('name'); ?> <?php wp_title(' / ', true, 'left'); ?></title>

	<?php
	/*----------------------------------------------------------------------------------------------------


		Serve up Google fonts if chosen in the theme options


	----------------------------------------------------------------------------------------------------*/
	?>

	<?php global $data; if($data['google_body'] && $data['google_body'] != 'Select Font'): ?>
	<link href='http://fonts.googleapis.com/css?family=<?php echo urlencode($data['google_body']); ?>:400,400italic,700,700italic&amp;subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese' rel='stylesheet' type='text/css' />
	<?php endif; ?>

	<?php if($data['google_nav'] && $data['google_nav'] != 'Select Font'): ?>
	<link href='http://fonts.googleapis.com/css?family=<?php echo urlencode($data['google_nav']); ?>:400,400italic,700,700italic&amp;subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese' rel='stylesheet' type='text/css' />
	<?php endif; ?>

	<?php if($data['google_headings'] && $data['google_headings'] != 'Select Font'): ?>
	<link href='http://fonts.googleapis.com/css?family=<?php echo urlencode($data['google_headings']); ?>:400,400italic,700,700italic&amp;subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese' rel='stylesheet' type='text/css' />
	<?php endif; ?>

	<?php if($data['google_footer_headings'] && $data['google_footer_headings'] != 'Select Font'): ?>
	<link href='http://fonts.googleapis.com/css?family=<?php echo urlencode($data['google_footer_headings']); ?>:400,400italic,700,700italic&amp;subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese' rel='stylesheet' type='text/css' />
	<?php endif; ?>

	<?php
	/*----------------------------------------------------------------------------------------------------


		CSS


	----------------------------------------------------------------------------------------------------*/
	?>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!--[if IE]>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/respond.min.js"></script>
	<![endif]-->

	<?php
	/*----------------------------------------------------------------------------------------------------


		Responsive CSS


	----------------------------------------------------------------------------------------------------*/
	?>

	<?php global $data; ?>
	<?php if($data['responsive']): ?>
	<?php $isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	if(!$isiPad || !$data['ipad_potrait']): ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<?php endif; ?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/media.css" />
		<?php if(!$data['ipad_potrait']): ?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ipad.css" />
		<?php else: ?>
		<style type="text/css">
		@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait){
			#wrapper .ei-slider{width:100% !important;}
		}
		@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape){
			#wrapper .ei-slider{width:100% !important;}
		}
		</style>
		<?php endif; ?>
	<?php else: ?>
		<style type="text/css">
		@media only screen and (min-device-width : 768px) and (max-device-width : 1024px){
			#wrapper .ei-slider{width:100% !important;}
		}
		</style>
		<?php $isiPhone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
		if($isiPhone):
		?>
		<style type="text/css">
		@media only screen and (min-device-width : 320px) and (max-device-width : 480px){
			#wrapper .ei-slider{width:100% !important;}
		}
		</style>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	/*----------------------------------------------------------------------------------------------------


		Icons


	----------------------------------------------------------------------------------------------------*/
	?>

	<?php if($data['favicon']): ?>
	<link rel="shortcut icon" href="<?php echo $data['favicon']; ?>" type="image/x-icon" />
	<?php endif; ?>

	<?php if($data['iphone_icon']): ?>
	<!-- For iPhone -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo $data['iphone_icon']; ?>">
	<?php endif; ?>

	<?php if($data['iphone_icon_retina']): ?>
	<!-- For iPhone 4 Retina display -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $data['iphone_icon_retina']; ?>">
	<?php endif; ?>

	<?php if($data['ipad_icon']): ?>
	<!-- For iPad -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $data['ipad_icon']; ?>">
	<?php endif; ?>

	<?php if($data['ipad_icon_retina']): ?>
	<!-- For iPad Retina display -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $data['ipad_icon_retina']; ?>">
	<?php endif; ?>

	<?php
	/*----------------------------------------------------------------------------------------------------


		jQuery


	----------------------------------------------------------------------------------------------------*/
	?>



	<?php
	/*----------------------------------------------------------------------------------

		This adds a map to the contact template, or provides the script at least
		for the map in the template to work

	----------------------------------------------------------------------------------*/
	?>

	<?php
	if((is_page_template('template-contact.php') || is_page_template('contact-2.php')) && $data['gmap_address']) {
    	wp_deregister_script( 'jquery.ui.map' );
    	wp_register_script( 'jquery.ui.map', get_bloginfo('template_directory').'/js/gmap.js', array(), false, true);
		wp_enqueue_script( 'jquery.ui.map' );
	?>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&amp;language=<?php echo substr(get_locale(), 0, 2); ?>"></script>
	<?php }?>


	<?php wp_head(); ?>



	<!--[if IE 8]>
		<script type="text/javascript">
		jQuery(document).ready(function() {
		var imgs, i, w;
		var imgs = document.getElementsByTagName( 'img' );
		for( i = 0; i < imgs.length; i++ ) {
		    w = imgs[i].getAttribute( 'width' );
		    if ( 615 < w ) {
		        imgs[i].removeAttribute( 'width' );
		        imgs[i].removeAttribute( 'height' );
		    }
		}
		});
		</script>
	<![endif]-->



	<?php
	/*----------------------------------------------------------------------------------

		No fucking idea what this garbage is doing...

	----------------------------------------------------------------------------------*/
	?>

	<script type="text/javascript">
	function insertParam(url, parameterName, parameterValue, atStart){
	    replaceDuplicates = true;
	    if(url.indexOf('#') > 0){
	        var cl = url.indexOf('#');
	        urlhash = url.substring(url.indexOf('#'),url.length);
	    } else {
	        urlhash = '';
	        cl = url.length;
	    }
	    sourceUrl = url.substring(0,cl);

	    var urlParts = sourceUrl.split("?");
	    var newQueryString = "";

	    if (urlParts.length > 1)
	    {
	        var parameters = urlParts[1].split("&");
	        for (var i=0; (i < parameters.length); i++)
	        {
	            var parameterParts = parameters[i].split("=");
	            if (!(replaceDuplicates && parameterParts[0] == parameterName))
	            {
	                if (newQueryString == "")
	                    newQueryString = "?";
	                else
	                    newQueryString += "&";
	                newQueryString += parameterParts[0] + "=" + (parameterParts[1]?parameterParts[1]:'');
	            }
	        }
	    }
	    if (newQueryString == "")
	        newQueryString = "?";

	    if(atStart){
	        newQueryString = '?'+ parameterName + "=" + parameterValue + (newQueryString.length>1?'&'+newQueryString.substring(1):'');
	    } else {
	        if (newQueryString !== "" && newQueryString != '?')
	            newQueryString += "&";
	        newQueryString += parameterName + "=" + (parameterValue?parameterValue:'');
	    }
	    return urlParts[0] + newQueryString + urlhash;
	};



	<?php
	/*----------------------------------------------------------------------------------

		This is one window.load function with a few inits inside it..

	----------------------------------------------------------------------------------*/
	?>

	jQuery(window).load(function() {

		<?php
		/*----------------------------------------------------------------------------------
			Inits the isotope script to portfolio items..
		----------------------------------------------------------------------------------*/
		?>
		jQuery('.portfolio-one .portfolio-wrapper').isotope({
			// options
			itemSelector: '.portfolio-item',
			layoutMode: 'straightDown',
			transformsEnabled: false
		});

		jQuery('.portfolio-two .portfolio-wrapper, .portfolio-three .portfolio-wrapper, .portfolio-four .portfolio-wrapper').isotope({
			// options
			itemSelector: '.portfolio-item',
			layoutMode: 'fitRows',
			transformsEnabled: false
		});


		<?php
		/*----------------------------------------------------------------------------------
			Don't know what the fuck this is doing? Iframes, vimeo & flexslider??
			I'm wondering if the rest of this bit is all adding navigation to video slides
			in flexslider?
		----------------------------------------------------------------------------------*/
		?>
		var iframes = jQuery('iframe');
		jQuery.each(iframes, function(i, v) {
			var src = jQuery(this).attr('src');
			if(src) {
				if(src.indexOf('vimeo') >= 1) {
					jQuery(this).attr('id', 'player_'+(i+1));
					var new_src = insertParam(src, 'api', '1', false);
					var new_src_2 = insertParam(new_src, 'player_id', 'player_'+(i+1), false);
					jQuery(this).attr('src', new_src_2);
				}
			}
		});

		var vimeoPlayers = jQuery('.flexslider').find('iframe'), player;

		for (var i = 0, length = vimeoPlayers.length; i < length; i++) {
		        player = vimeoPlayers[i];
		        $f(player).addEvent('ready', ready);
		}

		function addEvent(element, eventName, callback) {
		    if (element.addEventListener) {
		        element.addEventListener(eventName, callback, false)
		    } else {
		        element.attachEvent(eventName, callback, false);
		    }
		}

		function ready(player_id) {
		    var froogaloop = $f(player_id);
		    froogaloop.addEvent('play', function(data) {
		     jQuery('.flexslider, .tfs-slider').flexslider("pause");
		    });

		    froogaloop.addEvent('pause', function(data) {
		        jQuery('.flexslider, .tfs-slider').flexslider("play");
		    });
		}
		
		jQuery('.flexslider').flexslider({
			slideshow: <?php if($data["slideshow_autoplay"]) { echo 'true'; } else { echo 'false'; } ?>,
			video: true,
			pauseOnHover: false,
			useCSS: false,
			start: function(slider) {
				if(slider.currentSlide !== undefined) {
		        if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
		           <?php if($data['pagination_video_slide']): ?>
		           jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
		           <?php else: ?>
		           jQuery(slider).find('.flex-control-nav').hide();
		           <?php endif; ?>
		       } else {
		           <?php if($data['pagination_video_slide']): ?>
		           jQuery(slider).find('.flex-control-nav').css('bottom', '0');
		           <?php else: ?>
		           jQuery(slider).find('.flex-control-nav').show();
		           <?php endif; ?>
		       }
		   		}
			},
		    before: function(slider) {
		        if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
		           $f( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('pause');
		           /* ------------------  YOUTUBE FOR AUTOSLIDER ------------------ */
		           playVideoAndPauseOthers(jQuery('.play3 iframe')[0]);
		       }
		    },
		   	after: function(slider) {
		        if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
		           <?php if($data['pagination_video_slide']): ?>
		           jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
		           <?php else: ?>
		           jQuery(slider).find('.flex-control-nav').hide();
		           <?php endif; ?>
		       } else {
		           <?php if($data['pagination_video_slide']): ?>
		           jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
		           <?php else: ?>
		           jQuery(slider).find('.flex-control-nav').show();
		           <?php endif; ?>
		       }
		    }
		});

		function playVideoAndPauseOthers(frame) {
			jQuery('iframe').each(function(i) {
			var func = this === frame ? 'playVideo' : 'stopVideo';
			this.contentWindow.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
			});
		}

		/* ------------------ PREV & NEXT BUTTON FOR FLEXSLIDER (YOUTUBE) ------------------ */
		jQuery('.flex-next, .flex-prev').click(function() {
			playVideoAndPauseOthers(jQuery('.play3 iframe')[0]);
		});

		jQuery('.tparrows').each(function() {
			if(jQuery(this).css('visibility') == 'hidden') {
				jQuery(this).remove();
			}
		});

	});
	<?php
	/*----------------------------------------------------------------------------------

		This is the end of the one function with inits inside it.

	----------------------------------------------------------------------------------*/
	?>



	<?php
	/*----------------------------------------------------------------------------------

		A document.ready function with more script inits inside..

	----------------------------------------------------------------------------------*/
	?>

	jQuery(document).ready(function($) {

		function onAfter(curr, next, opts, fwd) {
		  var $ht = jQuery(this).height();

		  //set the container's height to that of the current slide
		  $(this).parent().animate({height: $ht});
		}

	    jQuery('.reviews').cycle({
			fx: 'fade',
			after: onAfter,
			<?php if($data['testimonials_speed']): ?>
			timeout: <?php echo $data['testimonials_speed']; ?>
			<?php endif; ?>
		});

		jQuery('.full-video, .video-shortcode, .wooslider .slide-content').fitVids();

		<?php if($data['image_rollover']): ?>
		/*$('.image').live('mouseenter', function(e) {
			if(!$(this).hasClass('slided')) {
				$(this).find('.image-extras').show().stop(true, true).animate({opacity: '1', left: '0'}, 400);
				$(this).addClass('slided');
			} else {
				$(this).find('.image-extras').stop(true, true).fadeIn('normal');
			}
		});
		$('.image-extras').mouseleave(function(e) {
			$(this).fadeOut('normal');
		});*/
		<?php endif; ?>

		var ppArgs = {
			<?php if($data["lightbox_animation_speed"]): ?>
			animation_speed: '<?php echo strtolower($data["lightbox_animation_speed"]); ?>',
			<?php endif; ?>
			overlay_gallery: <?php if($data["lightbox_gallery"]) { echo 'true'; } else { echo 'false'; } ?>,
			autoplay_slideshow: <?php if($data["lightbox_autoplay"]) { echo 'true'; } else { echo 'false'; } ?>,
			<?php if($data["lightbox_slideshow_speed"]): ?>
			slideshow: <?php echo $data['lightbox_slideshow_speed']; ?>,
			<?php endif; ?>
			<?php if($data["lightbox_opacity"]): ?>
			opacity: <?php echo $data['lightbox_opacity']; ?>,
			<?php endif; ?>
			show_title: <?php if($data["lightbox_title"]) { echo 'true'; } else { echo 'false'; } ?>,
			show_desc: <?php if($data["lightbox_desc"]) { echo 'true'; } else { echo 'false'; } ?>,
			<?php if(!$data["lightbox_social"]) { echo 'social_tools: "",'; } ?>
		};

		jQuery("a[rel^='prettyPhoto']").prettyPhoto(ppArgs);

		<?php if($data['lightbox_post_images']): ?>
		jQuery('.single-post .post-content a').has('img').prettyPhoto(ppArgs);
		<?php endif; ?>

		var mediaQuery = 'desk';

		if (Modernizr.mq('only screen and (max-width: 600px)') || Modernizr.mq('only screen and (max-height: 520px)')) {

			mediaQuery = 'mobile';
			jQuery("a[rel^='prettyPhoto']").unbind('click');
			<?php if($data['lightbox_post_images']): ?>
			jQuery('.single-post .post-content a').has('img').unbind('click');
			<?php endif; ?>
		} 

		// Disables prettyPhoto if screen small
		jQuery(window).resize(function() {
			if ((Modernizr.mq('only screen and (max-width: 600px)') || Modernizr.mq('only screen and (max-height: 520px)')) && mediaQuery == 'desk') {
				jQuery("a[rel^='prettyPhoto']").unbind('click.prettyphoto');
				<?php if($data['lightbox_post_images']): ?>
				jQuery('.single-post .post-content a').has('img').unbind('click.prettyphoto');
				<?php endif; ?>
				mediaQuery = 'mobile';
			} else if (!Modernizr.mq('only screen and (max-width: 600px)') && !Modernizr.mq('only screen and (max-height: 520px)') && mediaQuery == 'mobile') {
				jQuery("a[rel^='prettyPhoto']").prettyPhoto(ppArgs);
				<?php if($data['lightbox_post_images']): ?>
				jQuery('.single-post .post-content a').has('img').prettyPhoto(ppArgs);
				<?php endif; ?>
				mediaQuery = 'desk';
			}
		});


		/*------------------------------------------------------------------

			Side Navigation

		------------------------------------------------------------------*/
		<?php if($data['sidenav_behavior'] == 'Click'): ?>
				jQuery('.side-nav li a').live('click', function(e) {
					if(jQuery(this).find('.arrow').length >= 1) {
						if(jQuery(this).parent().find('> .children').length >= 1 && !$(this).parent().find('> .children').is(':visible')) {
							jQuery(this).parent().find('> .children').stop(true, true).slideDown('slow');
						} else {
							jQuery(this).parent().find('> .children').stop(true, true).slideUp('slow');
						}
					}

					if(jQuery(this).find('.arrow').length >= 1) {
						return false;
					}
				});
		<?php else: ?>
				jQuery('.side-nav li').hoverIntent({
				over: function() {
					if(jQuery(this).find('> .children').length >= 1) {
						jQuery(this).find('> .children').stop(true, true).slideDown('slow');
					}
				},
				out: function() {
					if(!jQuery(this).find('.current_page_item').length) {
						jQuery(this).find('.children').stop(true, true).slideUp('slow');
					}
				},
				timeout: 500
				});
		<?php endif; ?>

        var retina = window.devicePixelRatio > 1 ? true : false;

	});

	</script>



<style type="text/css">
	<?php global $data; ?>

		<?php if($data['primary_color']): ?>
		a:hover,
		.footer-area ul li a:hover,
		.side-nav li.current_page_item a,
		.portfolio-tabs li.active a, .faq-tabs li.active a,
		.project-content .project-info .project-info-box a:hover,
		.about-author .title a,
		span.dropcap,.footer-area a:hover,.copyright a:hover,
		#sidebar .widget_categories li a:hover,
		#main .post h2 a:hover,
		#sidebar .widget li a:hover,
		#nav ul a:hover{
			color:<?php echo $data['primary_color']; ?> !important;
		}
		.portfolio-tabs li.active a, .faq-tabs li.active a,
		.tab-holder .tabs li.active a,
		.post-content blockquote,
		.progress-bar-content,
		.pagination .current,
		.pagination a.inactive:hover {
			border-color:<?php echo $data['primary_color']; ?> !important;
		}
		.side-nav li.current_page_item a{
			border-right-color:<?php echo $data['primary_color']; ?> !important;	
		}
		.header-v2 .header-social, .header-v3 .header-social, .header-v4 .header-social,.header-v5 .header-social{
			border-top-color:<?php echo $data['primary_color']; ?> !important;	
		}
		h5.toggle.active span.arrow,
		.post-content ul.arrow li:before,
		.progress-bar-content,
		.pagination .current {
			background-color:<?php echo $data['primary_color']; ?> !important;
		}

		#main .pitch-container .button,
		#main .continue.button,
		#main .portfolio-one .button,
		#main .comment-submit,
		.button.default {
			border: 3px solid <?php echo $data['primary_color']; ?> !important;
		}

		.button-bg {
			background-color: <?php echo $data['primary_color']; ?> !important;
			opacity: 0.7;
		}

		.button-bg:hover {
			opacity: 1;
		}

		.sep-boxed-pricing ul li.title-row{
			background-color: <?php echo $data['primary_color']; ?> !important;
			border-color: <?php echo $data['primary_color']; ?> !important;
		}
		.pricing-row .exact_price, .pricing-row sup,
		#nav ul .current_page_item a, #nav ul .current-menu-item  a, #nav ul > .current-menu-parent a {
			color: <?php echo $data['primary_color']; ?> !important;
		}

		.image .image-extras {
			background: <?php echo $data['primary_color']; ?> !important;
		}

		<?php endif; ?>

		<?php
		if(get_option('show_on_front') && get_option('page_for_posts') && is_home()) {
			$c_pageID = get_option('page_for_posts');
		} else {
			$c_pageID = $post->ID;
		}
		?>

		<?php if($data['layout'] == 'Boxed'): ?>
		body{
			<?php if(get_post_meta($c_pageID, 'wired_page_bg_color', true)): ?>
			background-color:<?php echo get_post_meta($c_pageID, 'wired_page_bg_color', true); ?>;
			<?php else: ?>
			background-color:<?php echo $data['bg_color']; ?>;
			<?php endif; ?>

			<?php if(get_post_meta($c_pageID, 'wired_page_bg', true)): ?>
			background-image:url(<?php echo get_post_meta($c_pageID, 'wired_page_bg', true); ?>);
			background-repeat:<?php echo get_post_meta($c_pageID, 'wired_page_bg_repeat', true); ?>;
				<?php if(get_post_meta($c_pageID, 'wired_page_bg_full', true) == 'yes'): ?>
				background-attachment:fixed;
				background-position:center center;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				<?php endif; ?>
			<?php elseif($data['bg_image']): ?>
			background-image:url(<?php echo $data['bg_image']; ?>);
			background-repeat:<?php echo $data['bg_repeat']; ?>;
				<?php if($data['bg_full']): ?>
				background-attachment:fixed;
				background-position:center center;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				<?php endif; ?>
			<?php endif; ?>

			<?php if($data['bg_pattern_option'] && $data['bg_pattern'] && !(get_post_meta($c_pageID, 'wired_page_bg_color', true) || get_post_meta($c_pageID, 'wired_page_bg', true))): ?>
			background-image:url("<?php echo get_bloginfo('template_directory') . '/images/patterns/' . $data['bg_pattern'] . '.png'; ?>");
			background-repeat:repeat;
			<?php endif; ?>
		}
		#wrapper{
			background:#fff;
			width:1000px;
			margin:0 auto;
		}
		#layerslider-container{
			overflow:hidden;
		}
		<?php endif; ?>

		<?php if(get_post_meta($c_pageID, 'wired_page_title_bar_bg', true)): ?>
		.page-title-container{
			background-image:url(<?php echo get_post_meta($c_pageID, 'wired_page_title_bar_bg', true); ?>) !important;
		}
		<?php elseif($data['page_title_bg']): ?>
		.page-title-container{
			background-image:url(<?php echo $data['page_title_bg']; ?>) !important;
		}
		<?php endif; ?>

		<?php if(get_post_meta($c_pageID, 'wired_page_title_bar_bg_color', true)): ?>
		.page-title-container{
			background-color:<?php echo get_post_meta($c_pageID, 'wired_page_title_bar_bg_color', true); ?>;
		}
		<?php elseif($data['page_title_bg_color']): ?>
		.page-title-container{
			background-color:<?php echo $data['page_title_bg_color']; ?>;
		}
		<?php endif; ?>

		<?php if( $data['custom_font_woff'] && $data['custom_font_ttf'] && $data['custom_font_svg'] && $data['custom_font_eot'] ) : ?>
		@font-face {
			font-family: 'MuseoSlab500Regular';
			src: url('<?php echo $data['custom_font_eot']; ?>');
			src:
				url('<?php echo $data['custom_font_eot']; ?>?#iefix') format('eot'),
				url('<?php echo $data['custom_font_woff']; ?>') format('woff'),
				url('<?php echo $data['custom_font_ttf']; ?>') format('truetype'),
				url('<?php echo $data['custom_font_svg']; ?>#MuseoSlab500Regular') format('svg');
		    font-weight: 400;
		    font-style: normal;
		}
		<?php $custom_font = true; endif; ?>

		<?php
		if($data['google_body'] != 'Select Font') {
			$font = '"'.$data['google_body'].'", Arial, Helvetica, sans-serif !important';
		} elseif($data['standard_body'] != 'Select Font') {
			$font = $data['standard_body'].' !important';
		}
		?>

		body,#nav ul li ul li a,
		.more,
		.inhouse-container h3,
		.meta .date,
		.review blockquote q,
		.review blockquote div strong,
		.image .image-extras .image-extras-content h4,
		.project-content .project-info h4,
		.post-content blockquote,
		.ei-title h3{
			font-family:<?php echo $font; ?>;
		}
		.inhouse-container h3,
		.review blockquote div strong,
		.footer-area  h3,
		.button.large,
		.button.small{
			font-weight:bold;
		}
		.meta .date,
		.review blockquote q,
		.post-content blockquote{
			font-style:italic;
		}

		<?php
		if(!$custom_font && $data['google_nav'] != 'Select Font') {
			$nav_font = '"'.$data['google_nav'].'", Arial, Helvetica, sans-serif !important';
		} elseif(!$custom_font && $data['standard_nav'] != 'Select Font') {
			$nav_font = $data['standard_nav'].' !important';
		}
		if(isset($nav_font)):
		?>

		#nav,
		.side-nav li a{
			font-family:<?php echo $nav_font; ?>;
		}
		<?php endif; ?>

		<?php
		if(!$custom_font && $data['google_headings'] != 'Select Font') {
			$headings_font = '"'.$data['google_headings'].'", Arial, Helvetica, sans-serif !important';
		} elseif(!$custom_font && $data['standard_headings'] != 'Select Font') {
			$headings_font = $data['standard_headings'].' !important';
		}
		if(isset($headings_font)):
		?>

		#main .pitch-container h2,
		#main h2,
		.page-title h1,
		.image .image-extras .image-extras-content h3,
		#main .post h2,
		#sidebar .widget h3,
		.tab-holder .tabs li a,
		.share-box h4,
		.project-content h3,
		h5.toggle a,
		.full-boxed-pricing ul li.title-row,
		.full-boxed-pricing ul li.pricing-row,
		.sep-boxed-pricing ul li.title-row,
		.sep-boxed-pricing ul li.pricing-row,
		.person-author-wrapper,
		.post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6 {
			font-family:<?php echo $headings_font; ?>;
		}
		<?php endif; ?>

		<?php
		if($data['google_footer_headings'] != 'Select Font') {
			$font = '"'.$data['google_footer_headings'].'", Arial, Helvetica, sans-serif !important';
		} elseif($data['standard_footer_headings'] != 'Select Font') {
			$font = $data['standard_footer_headings'].' !important';
		}
		?>

		.footer-area  h3{
			font-family:<?php echo $font; ?>;
		}

		<?php if($data['body_font_size']): ?>
		body,#sidebar .slide-excerpt h2, .footer-area .slide-excerpt h2{
			font-size:<?php echo $data['body_font_size']; ?>px;
			<?php
			$line_height = round((1.5 * $data['body_font_size']));
			?>
			line-height:<?php echo $line_height; ?>px;
		}
		.project-content .project-info h4{
			font-size:<?php echo $data['body_font_size']; ?>px !important;
			<?php
			$line_height = round((1.5 * $data['body_font_size']));
			?>
			line-height:<?php echo $line_height; ?>px !important;
		}
		<?php endif; ?>

		<?php if($data['nav_font_size']): ?>
		#nav{font-size:<?php echo $data['nav_font_size']; ?>px !important;}
		<?php endif; ?>

		<?php if($data['snav_font_size']): ?>
		.header-social *{font-size:<?php echo $data['snav_font_size']; ?>px !important;}
		<?php endif; ?>

		<?php if($data['breadcrumbs_font_size']): ?>
		.page-title ul li,page-title ul li a{font-size:<?php echo $data['breadcrumbs_font_size']; ?>px !important;}
		<?php endif; ?>

		<?php if($data['side_nav_font_size']): ?>
		.side-nav li a{font-size:<?php echo $data['side_nav_font_size']; ?>px !important;}
		<?php endif; ?>

		<?php if($data['sidew_font_size']): ?>
		#sidebar .widget h3{font-size:<?php echo $data['sidew_font_size']; ?>px !important;}
		<?php endif; ?>

		<?php if($data['footw_font_size']): ?>
		.footer-area h3{font-size:<?php echo $data['footw_font_size']; ?>px !important;}
		<?php endif; ?>

		<?php if($data['copyright_font_size']): ?>
		.copyright{font-size:<?php echo $data['copyright_font_size']; ?>px !important;}
		<?php endif; ?>

		<?php if($data['responsive']): ?>
		#header .inside-container, #main .inside-container, .footer-area .inside-container, #footer .inside-container{ max-width:940px; }
		<?php endif; ?>

		<?php if($data['h1_font_size']): ?>
		.post-content h1{
			font-size:<?php echo $data['h1_font_size']; ?>px !important;
			<?php
			$line_height = round((1.5 * $data['h1_font_size']));
			?>
			line-height:<?php echo $line_height; ?>px !important;
		}
		<?php endif; ?>

		<?php if($data['h2_font_size']): ?>
		.post-content h2,.title h2,#main .post-content .title h2,.page-title h1,#main .post h2 a{
			font-size:<?php echo $data['h2_font_size']; ?>px !important;
			<?php
			$line_height = round((1.5 * $data['h2_font_size']));
			?>
			line-height:<?php echo $line_height; ?>px !important;
		}
		<?php endif; ?>

		<?php if($data['h3_font_size']): ?>
		.post-content h3,.project-content h3,#header .tagline{
			font-size:<?php echo $data['h3_font_size']; ?>px !important;
			<?php
			$line_height = round((1.5 * $data['h3_font_size']));
			?>
			line-height:<?php echo $line_height; ?>px !important;
		}
		<?php endif; ?>

		<?php if($data['h4_font_size']): ?>
		.post-content h4{
			font-size:<?php echo $data['h4_font_size']; ?>px !important;
			<?php
			$line_height = round((1.5 * $data['h4_font_size']));
			?>
			line-height:<?php echo $line_height; ?>px !important;
		}
		h5.toggle a,.tab-holder .tabs li a,.share-box h4,.person-author-wrapper{
			font-size:<?php echo $data['h4_font_size']; ?>px !important;
		}
		<?php endif; ?>

		<?php if($data['h5_font_size']): ?>
		.post-content h5{
			font-size:<?php echo $data['h5_font_size']; ?>px !important;
			<?php
			$line_height = round((1.5 * $data['h5_font_size']));
			?>
			line-height:<?php echo $line_height; ?>px !important;
		}
		<?php endif; ?>

		<?php if($data['h6_font_size']): ?>
		.post-content h6{
			font-size:<?php echo $data['h6_font_size']; ?>px !important;
			<?php
			$line_height = round((1.5 * $data['h6_font_size']));
			?>
			line-height:<?php echo $line_height; ?>px !important;
		}
		<?php endif; ?>

		<?php if($data['es_title_font_size']): ?>
		.ei-title h2{
			font-size:<?php echo $data['es_title_font_size']; ?>px !important;
			<?php
			$line_height = round((1.5 * $data['es_title_font_size']));
			?>
			line-height:<?php echo $line_height; ?>px !important;
		}
		<?php endif; ?>

		<?php if($data['body_text_color']): ?>
		body,.post .post-content,.post-content blockquote,.tab-holder .news-list li .post-holder .meta,#sidebar #jtwt,.meta,.review blockquote div,.search input,.project-content .project-info h4{color:<?php echo $data['body_text_color']; ?> !important;}
		<?php endif; ?>

		<?php if($data['headings_color']): ?>
		.post-content h1, .post-content h2, .post-content h3,
		.post-content h4, .post-content h5, .post-content h6,
		#sidebar .widget h3,h5.toggle a, .tab-holder .tabs li a,
		.page-title h1,.full-boxed-pricing ul li.title-row,
		.image .image-extras .image-extras-content h3,.project-content .project-info h4,.project-content h3,.share-box h4,.title h2,.person-author-wrapper,#sidebar .tab-holder .tabs li a,#header .tagline{
			color:<?php echo $data['headings_color']; ?> !important;
		}
		<?php endif; ?>

		<?php if($data['link_color']): ?>
		body a,.project-content .project-info .project-info-box a,#sidebar .widget li a, #sidebar .widget .recentcomments, #sidebar .widget_categories li, #main .post h2 a{color:<?php echo $data['link_color']; ?> !important;}
		<?php endif; ?>

		<?php if($data['breadcrumbs_text_color']): ?>
		.page-title ul li,.page-title ul li a{color:<?php echo $data['breadcrumbs_text_color']; ?> !important;}
		<?php endif; ?>

		<?php if($data['footer_headings_color']): ?>
		.footer-area h3{color:<?php echo $data['footer_headings_color']; ?> !important;}
		<?php endif; ?>

		<?php if($data['footer_text_color']): ?>
		.footer-area,.footer-area #jtwt,.copyright{color:<?php echo $data['footer_text_color']; ?> !important;}
		<?php endif; ?>

		<?php if($data['footer_link_color']): ?>
		.footer-area a,.copyright a{color:<?php echo $data['footer_link_color']; ?> !important;}
		<?php endif; ?>

		<?php if($data['menu_first_color']): ?>
		#nav ul a,.side-nav li a{color:<?php echo $data['menu_first_color']; ?> !important;}
		<?php endif; ?>

		<?php if($data['menu_sub_bg_color']): ?>
		#nav ul ul{background-color:<?php echo $data['menu_sub_bg_color']; ?> !important;}
		<?php endif; ?>

		<?php if($data['menu_sub_color']): ?>
		#wrapper #nav ul li ul li a,.side-nav li li a,.side-nav li.current_page_item li a{color:<?php echo $data['menu_sub_color']; ?> !important;}
		<?php endif; ?>

		<?php if($data['snav_color']): ?>
		#wrapper .header-social *{color:<?php echo $data['snav_color']; ?> !important;}
		#wrapper .header-social .menu li{border-color:<?php echo $data['snav_color']; ?> !important;}
		<?php endif; ?>

		<?php if(is_single() && get_post_meta($c_pageID, 'wired_fimg_width', true)): ?>
		#post-<?php echo $c_pageID; ?> .post-slideshow,
		#post-<?php echo $c_pageID; ?> .post-slideshow img{width:<?php echo get_post_meta($c_pageID, 'wired_fimg_width', true); ?> !important;}
		<?php endif; ?>

		<?php if(is_single() && get_post_meta($c_pageID, 'wired_fimg_height', true)): ?>
		#post-<?php echo $c_pageID; ?> .post-slideshow, #post-<?php echo $c_pageID; ?> .post-slideshow img{height:<?php echo get_post_meta($c_pageID, 'wired_fimg_height', true); ?> !important;}
		<?php endif; ?>

		<?php if(!$data['flexslider_circles']): ?>
		.main-flex .flex-control-nav{display:none !important;}
		<?php endif; ?>
		
		<?php if(!$data['breadcrumb_mobile']): ?>
		@media only screen and (max-width: 940px){
			.breadcrumbs{display:none !important;}
		}
		@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait){
			.breadcrumbs{display:none !important;}
		}
		<?php endif; ?>

		<?php if(!$data['image_rollover']): ?>
		.image-extras{display:none !important;}
		<?php endif; ?>

		@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2) {
			.page-title-container {
				background-image: url(<?php echo $data['page_title_bg_retina']; ?>) !important;
				-webkit-background-size:cover;
				   -moz-background-size:cover;
				     -o-background-size:cover;
				        background-size:cover;
			}
		}

		.isotope .isotope-item {
		  -webkit-transition-property: top, left, opacity;
		     -moz-transition-property: top, left, opacity;
		      -ms-transition-property: top, left, opacity;
		       -o-transition-property: top, left, opacity;
		          transition-property: top, left, opacity;
		}

		<?php echo $data['custom_css']; ?>
	</style>


	

	<!--<style type="text/css" id="ss">
	</style>
	<link rel="stylesheet" id="style_selector_ss" href="#" />-->
	
	<?php echo $data['google_analytics']; ?>

	<?php echo $data['space_head']; ?>
</head>

	<?php
	/*----------------------------------------------------------------------------------------------------


		End of head / start the body


	----------------------------------------------------------------------------------------------------*/
	?>

<body <?php body_class(); ?>>

	<div id="wrapper">

	<?php
	/*----------------------------------------------------------------------------------------------------


		Serve up the header layout that is chosen


	----------------------------------------------------------------------------------------------------*/
	?>

	<header id="header">
		<div class="inside-container" style="margin-top:<?php echo $data['margin_header_top']; ?>;margin-bottom:<?php echo $data['margin_header_bottom']; ?>;">
			<div class="logo" style="margin-left:<?php echo $data['margin_logo_left']; ?>;margin-bottom:<?php echo $data['margin_logo_bottom']; ?>;"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $data['logo']; ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
			<?php if($data['ubermenu']): ?>
			<nav id="nav-uber">
			<?php else: ?>
			<nav id="nav" class="nav-holder">
			<?php endif; ?>
				<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'depth' => 4, 'container' => false, 'menu_id' => 'nav')); ?>
			</nav>
		</div>
	</header>

	<?php
	/*----------------------------------------------------------------------------------------------------


		Serve up the slider


	----------------------------------------------------------------------------------------------------*/
	?>

	<?php if(!is_search()): ?>
		<div id="sliders-container">
			<?php
			// Layer Slider
			$slider_page_id = $post->ID;
			if(is_home() && !is_front_page()){
				$slider_page_id = get_option('page_for_posts');
			}
			if(get_post_meta($slider_page_id, 'wired_slider_type', true) == 'layer' && (get_post_meta($slider_page_id, 'wired_slider', true) || get_post_meta($slider_page_id, 'wired_slider', true) != 0)): ?>
			
			<?php
			// Get slider
			$ls_table_name = $wpdb->prefix . "layerslider";
			$ls_id = get_post_meta($slider_page_id, 'wired_slider', true);
			$ls_slider = $wpdb->get_row("SELECT * FROM $ls_table_name WHERE id = ".(int)$ls_id." ORDER BY date_c DESC LIMIT 1" , ARRAY_A);
			$ls_slider = json_decode($ls_slider['data'], true);
			?>

			<style type="text/css">
				#layerslider-container{max-width:<?php echo $ls_slider['properties']['width'] ?>;}
			</style>

			<div id="layerslider-container">
				<div id="layerslider-wrapper">
					<?php echo do_shortcode('[layerslider id="'.get_post_meta($slider_page_id, 'wired_slider', true).'"]'); ?>
				</div>
			</div>
			<?php endif; ?>

			<?php
				if(get_post_meta($slider_page_id, 'wired_slider_type', true) == 'rev' && get_post_meta($slider_page_id, 'wired_revslider', true)) {
					putRevSlider(get_post_meta($slider_page_id, 'wired_revslider', true));
				}
			?>
		</div><!-- /#sliders-container -->
	<?php endif; ?>

	<?php if(get_post_meta($slider_page_id, 'wired_fallback', true)): ?>
		<style type="text/css">
			@media only screen and (max-width: 940px){
				#sliders-container{display:none;}
				#fallback-slide{display:block;}
			}
			@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait){
				#sliders-container{display:none;}
				#fallback-slide{display:block;}
			}
		</style>

		<div id="fallback-slide">
			<img src="<?php echo get_post_meta($slider_page_id, 'wired_fallback', true); ?>" alt="" />
		</div>
	<?php endif; ?>

	<?php
	/*----------------------------------------------------------------------------------------------------


		Serve up the page title


	----------------------------------------------------------------------------------------------------*/
	?>

	<?php if($data['page_title_bar']): ?>

		<?php if(((is_page() || is_single() || is_singular('inhouse_portfolio')) && get_post_meta($c_pageID, 'wired_page_title', true) == 'yes')) : ?>
		<div class="page-title-container">
			<div class="page-title">
				<div class="page-title-wrapper">
				<h1><?php the_title(); ?></h1>
				<?php if($data['breadcrumb']): ?>
				<?php if($data['page_title_bar_bs'] == 'Breadcrumbs'): ?>
				<?php wiredthemes_breadcrumb(); ?>
				<?php else: ?>
				<?php get_search_form(); ?>
				<?php endif; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if(is_home() && !is_front_page() && get_post_meta($slider_page_id, 'wired_page_title', true) == 'yes'): ?>
		<div class="page-title-container">
			<div class="page-title">
				<div class="page-title-wrapper">
				<h1><?php echo $data['blog_title']; ?></h1>
				<?php if($data['breadcrumb']): ?>
				<?php if($data['page_title_bar_bs'] == 'Breadcrumbs'): ?>
				<?php wiredthemes_breadcrumb(); ?>
				<?php else: ?>
				<?php get_search_form(); ?>
				<?php endif; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if(is_search()): ?>
		<div class="page-title-container">
			<div class="page-title">
				<div class="page-title-wrapper">
				<h1><?php echo __('Search results for:', 'Inhouse'); ?> <?php echo get_search_query(); ?></h1>
				<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if(is_404()): ?>
		<div class="page-title-container">
			<div class="page-title">
				<div class="page-title-wrapper">
				<h1><?php echo __('Error 404 Page', 'Inhouse'); ?></h1>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if(is_archive()): ?>
		<div class="page-title-container">
			<div class="page-title">
				<div class="page-title-wrapper">
				<h1>
					<?php if ( is_day() ) : ?>
						<?php printf( __( 'Daily Archives: %s', 'Inhouse' ), '<span>' . get_the_date() . '</span>' ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Monthly Archives: %s', 'Inhouse' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'Inhouse' ) ) . '</span>' ); ?>
					<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Yearly Archives: %s', 'Inhouse' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'Inhouse' ) ) . '</span>' ); ?>
					<?php else : ?>
						<?php single_cat_title(); ?>
					<?php endif; ?>
				</h1>
				<?php if($data['breadcrumb']): ?>
				<?php if($data['page_title_bar_bs'] == 'Breadcrumbs'): ?>
				<?php wiredthemes_breadcrumb(); ?>
				<?php else: ?>
				<?php get_search_form(); ?>
				<?php endif; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

	<?php endif; ?>

	<?php
	/*----------------------------------------------------------------------------------------------------


		Check if this is the contact template


	----------------------------------------------------------------------------------------------------*/
	?>

	<?php if(is_page_template('template-contact.php') && $data['gmap_address']): ?>
	<style type="text/css">
	#gmap{
		width:<?php echo $data['gmap_width']; ?>;
		margin:0 auto;
		<?php if($data['gmap_width'] != '100%'): ?>
		margin-top:55px;
		<?php endif; ?>

		<?php if($data['gmap_height']): ?>
		height:<?php echo $data['gmap_height']; ?>;
		<?php else: ?>
		height:415px;
		<?php endif; ?>
	}
	</style>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		var geocoder = new google.maps.Geocoder();
		var address = "new york";

		geocoder.geocode({'address':'<?php echo $data['gmap_address']; ?>'}, function(results, status) {
			if(status == google.maps.GeocoderStatus.OK) {
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();

				jQuery('#gmap').gmap().bind('init', function(ev, map) {
					jQuery('#gmap').gmap('addMarker', {'position': latitude+','+longitude, 'bounds': true}).click(function() {
						jQuery('#gmap').gmap('openInfoWindow', {'content': '<?php echo ucwords($data['gmap_address']); ?>'}, this);
					});
					jQuery('#gmap').gmap('option', 'zoom', <?php echo $data['map_zoom_level']; ?>);
					<?php if($data['map_scrollwheel']): ?>
					jQuery('#gmap').gmap('option', 'disableDefaultUI', true);
					<?php endif; ?>
				});
			} 
		});
	});
	</script>
	<div class="gmap" id="gmap">
	</div>
	<?php endif; ?>

	<?php
	/*----------------------------------------------------------------------------------------------------


		Check if this is contact 2 template


	----------------------------------------------------------------------------------------------------*/
	?>

	<?php if(is_page_template('contact-2.php') && $data['gmap_address']): ?>
	<style type="text/css">
	#gmap{
		width:100%;
		margin:0 auto;
	}
	</style>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		var geocoder = new google.maps.Geocoder();
		var address = "new york";

		geocoder.geocode({'address':'<?php echo $data['gmap_address']; ?>'}, function(results, status) {
			if(status == google.maps.GeocoderStatus.OK) {
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();

				jQuery('#gmap').gmap().bind('init', function(ev, map) {
					jQuery('#gmap').gmap('addMarker', {'position': latitude+','+longitude, 'bounds': true}).click(function() {
						jQuery('#gmap').gmap('openInfoWindow', {'content': '<?php echo ucwords($data['gmap_address']); ?>'}, this);
					});
					jQuery('#gmap').gmap('option', 'zoom', <?php echo $data['map_zoom_level']; ?>);
					<?php if($data['map_scrollwheel']): ?>
					jQuery('#gmap').gmap('option', 'disableDefaultUI', true);
					<?php endif; ?>
				});
			} 
		});
	});
	</script>
	<div class="gmap" id="gmap">
	</div>
	<?php endif; ?>

	<?php
	/*----------------------------------------------------------------------------------------------------


		Start the main content


	----------------------------------------------------------------------------------------------------*/
	?>

	<div id="main" style="overflow:hidden !important;">
		
		<div class="inside-container">