<?php

/*----------------------------------------------------
	Remove extra <p> tags
----------------------------------------------------*/
function inhouse_shortcodes_formatter($content) {
	$block = join("|",array("youtube", "vimeo", "soundcloud", "button", "dropcap", "highlight", "checklist", "tabs", "tab", "accordian", "toggle", "one_half", "one_third", "one_fourth", "two_third", "three_fourth", "company_pitch", "pricing_table", "pricing_column", "pricing_price", "pricing_row", "pricing_footer", "content_boxes", "content_box", "slider", "slide", "testimonials", "testimonial", "progress", "person", "recent_posts", "recent_works", "alert", "fontawesome", "social_links", "clients", "client", "title", "separator"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);

	return $rep;
}

add_filter('the_content', 'inhouse_shortcodes_formatter');
add_filter('widget_text', 'inhouse_shortcodes_formatter');

/*----------------------------------------------------
	YouTube Embeds
----------------------------------------------------*/
add_shortcode('youtube', 'shortcode_youtube');
	function shortcode_youtube($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'width' => 600,
				'height' => 360
			), $atts);

			return '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></iframe></div></div>';
	}
	
/*----------------------------------------------------
	Vimeo Embeds
----------------------------------------------------*/
add_shortcode('vimeo', 'shortcode_vimeo');
	function shortcode_vimeo($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><iframe src="http://player.vimeo.com/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div></div>';
	}
	
/*----------------------------------------------------
	SoundCloud Embeds
----------------------------------------------------*/
add_shortcode('soundcloud', 'shortcode_soundcloud');
	function shortcode_soundcloud($atts) {
		$atts = shortcode_atts(
			array(
				'url' => '',
				'width' => '100%',
				'height' => 81,
				'comments' => 'true',
				'auto_play' => 'true',
				'color' => 'ff7700',
			), $atts);
			
			return '<iframe width="'.$atts['width'].'" height="'.$atts['height'].'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '"></iframe>';
			//return '<object height="' . $atts['height'] . '" width="' . $atts['width'] . '"><param name="movie" value="http://player.soundcloud.com/player.swf?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '"></param><param name="allowscriptaccess" value="always"></param><embed allowscriptaccess="always" height="' . $atts['height'] . '" src="http://player.soundcloud.com/player.swf?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '" type="application/x-shockwave-flash" width="' . $atts['width'] . '"></embed></object>';
	}
	
/*----------------------------------------------------
	Buttons
----------------------------------------------------*/
add_shortcode('button', 'shortcode_button');
	function shortcode_button($atts, $content = null) {
			if(!$atts['color']) {
				$atts['color'] = 'default';
			}
			return '<a class="button ' . $atts['size'] . ' ' . $atts['color'] . '" href="' . $atts['link'] . '" target="' . $atts['target'] . '"><div class="button-bg">' .do_shortcode($content). '</div></a>';
	}
	
/*----------------------------------------------------
	Dropcaps
----------------------------------------------------*/
add_shortcode('dropcap', 'shortcode_dropcap');
	function shortcode_dropcap( $atts, $content = null ) {  
		
		return '<span class="dropcap">' .do_shortcode($content). '</span>';  
		
}
	
/*----------------------------------------------------
	Highlights
----------------------------------------------------*/
add_shortcode('highlight', 'shortcode_highlight');
	function shortcode_highlight($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'color' => 'yellow',
			), $atts);
			
			if($atts['color'] == 'black') {
				return '<span class="highlight2">' .do_shortcode($content). '</span>';
			} else {
				return '<span class="highlight1">' .do_shortcode($content). '</span>';
			}

	}
	
/*----------------------------------------------------
	Check list
----------------------------------------------------*/
add_shortcode('checklist', 'shortcode_checklist');
	function shortcode_checklist( $atts, $content = null ) {
	
	$content = str_replace('<ul>', '<ul class="arrow">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));
	
	return $content;
	
}

/*----------------------------------------------------
	Tabs
----------------------------------------------------*/
add_shortcode('tabs', 'shortcode_tabs');
	function shortcode_tabs( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
    
    $out = '';

    $out .= '<div class="tab-holder shortcode-tabs">';

	$out .= '<div class="tab-hold tabs-wrapper">';
	
	$out .= '<ul id="tabs" class="tabset tabs">';
	foreach ($atts as $key => $tab) {
		$out .= '<li><a href="#' . $key . '">' . $tab . '</a></li>';
	}
	$out .= '</ul>';
	
	$out .= '<div class="tab-box tabs-container">';

	$out .= do_shortcode($content) .'</div></div></div>';
	
	return $out;
}

add_shortcode('tab', 'shortcode_tab');
	function shortcode_tab( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
    
	$out = '';
	$out .= '<div id="tab' . $atts['id'] . '" class="tab tab_content">' . do_shortcode($content) .'</div>';
	
	return $out;
}

/*----------------------------------------------------
	Accordian
----------------------------------------------------*/
add_shortcode('accordian', 'shortcode_accordian');
	function shortcode_accordian( $atts, $content = null ) {
	$out = '';
	$out .= '<div class="accordian">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}	

/*----------------------------------------------------
	Toggles
----------------------------------------------------*/
add_shortcode('toggle', 'shortcode_toggle');
	function shortcode_toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title'      => '',
        'open' => 'no'
    ), $atts));

    $toggleclass = '';
    $toggleclass2 = '';
    $togglestyle = '';

	if($open == 'yes'){
		$toggleclass = "active";
		$toggleclass2 = "default-open";
		$togglestyle = "display: block;";
	}

	$out = '';
	$out .= '<h5 class="toggle '.$toggleclass.'"><a href="#"><span class="arrow"></span>' .$title. '</a></h5>';
	$out .= '<div class="toggle-content '.$toggleclass2.'" style="'.$togglestyle.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
	
/*----------------------------------------------------
	1/2 Column
----------------------------------------------------*/
add_shortcode('one_half', 'shortcode_one_half');
	function shortcode_one_half($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="one_half last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="one_half">' .do_shortcode($content). '</div>';
			}

	}
	
/*----------------------------------------------------
	1/3 Column
----------------------------------------------------*/
add_shortcode('one_third', 'shortcode_one_third');
	function shortcode_one_third($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="one_third last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="one_third">' .do_shortcode($content). '</div>';
			}

	}
	
/*----------------------------------------------------
	2/3 Column
----------------------------------------------------*/
add_shortcode('two_third', 'shortcode_two_third');
	function shortcode_two_third($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="two_third last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="two_third">' .do_shortcode($content). '</div>';
			}

	}
	
/*----------------------------------------------------
	1/4 Column
----------------------------------------------------*/
add_shortcode('one_fourth', 'shortcode_one_fourth');
	function shortcode_one_fourth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="one_fourth last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="one_fourth">' .do_shortcode($content). '</div>';
			}

	}
	
/*----------------------------------------------------
	3/4 Column
----------------------------------------------------*/
add_shortcode('three_fourth', 'shortcode_three_fourth');
	function shortcode_three_fourth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="three_fourth last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="three_fourth">' .do_shortcode($content). '</div>';
			}

	}

/*----------------------------------------------------
	Pitch Box
----------------------------------------------------*/
add_shortcode('company_pitch', 'shortcode_company_pitch');
	function shortcode_company_pitch($atts, $content = null) {
		$str = '';
		$str .= '<section class="pitch-container"><div class="pitch-inside">';
			if($atts['link'] && $atts['button']):
			$str .= '<a href="'.$atts['link'].'" target="'.$atts['linktarget'].'" class="continue button large"><div class="button-bg">'.$atts['button'].'</div></a>';
			endif;
			if($atts['title']):
			$str .= '<h2>'.$atts['title'].'</h2>';
			endif;
			if($atts['description']):
			$str.= '<p>'.$atts['description'].'</p>';
			endif;
			if($atts['link'] && $atts['button']):
			$str .= '<a href="'.$atts['link'].'" target="'.$atts['linktarget'].'" class="continue mobile-button button large"><div class="button-bg">'.$atts['button'].'</div></a>';
			endif;
		$str .= '</div></section>';

		return $str;
	}

/*----------------------------------------------------
	Pricing Tables
----------------------------------------------------*/
add_shortcode('pricing_table', 'shortcode_pricing_table');
	function shortcode_pricing_table($atts, $content = null) {
		$str = '';
		if($atts['type'] == '2') {
			$type = 'sep';
		} else {
			$type = 'full';
		}
		$str .= '<div class="'.$type.'-boxed-pricing">';
		$str .= do_shortcode($content);
		$str .= '</div><div class="clear"></div>';

		return $str;
	}

/*----------------------------------------------------
	Pricing Column
----------------------------------------------------*/
add_shortcode('pricing_column', 'shortcode_pricing_column');
	function shortcode_pricing_column($atts, $content = null) {
		$str = '<div class="column">';
		$str .= '<ul>';
		if($atts['title']):
		$str .= '<li class="title-row">'.$atts['title'].'</li>';
		endif;
		$str .= do_shortcode($content);
		$str .= '</ul>';
		$str .= '</div>';

		return $str;
	}

/*----------------------------------------------------
	Pricing Row
----------------------------------------------------*/
add_shortcode('pricing_price', 'shortcode_pricing_price');
	function shortcode_pricing_price($atts, $content = null) {
		$str = '';
		$str .= '<li class="pricing-row">';
		if(isset($atts['currency']) && !empty($atts['currency']) && isset($atts['price']) && !empty($atts['price'])) {
			$class = '';
			$price = explode('.', $atts['price']);
			if($price[1]){
				$class .= 'price-with-decimal';
			}
			$str .= '<div class="price '.$class.'">';
				$str .= '<strong>'.$atts['currency'].'</strong>';
				$str .= '<em class="exact_price">'.$price[0].'</em>';
				if($price[1]){
					$str .= '<sup>'.$price[1].'</sup>';
				}
				if($atts['time']) {
					$str .= '<em class="time">'.$atts['time'].'</em>';
				}
			$str .= '</div>';
		} else {
			$str .= do_shortcode($content);
		}
		$str .= '</li>';

		return $str;
	}

/*----------------------------------------------------
	Pricing Row
----------------------------------------------------*/
add_shortcode('pricing_row', 'shortcode_pricing_row');
	function shortcode_pricing_row($atts, $content = null) {
		$str = '';
		$str .= '<li class="normal-row">';
		$str .= do_shortcode($content);
		$str .= '</li>';

		return $str;
	}

/*----------------------------------------------------
	Pricing Footer
----------------------------------------------------*/
add_shortcode('pricing_footer', 'shortcode_pricing_footer');
	function shortcode_pricing_footer($atts, $content = null) {
		$str = '';
		$str .= '<li class="footer-row">';
		$str .= do_shortcode($content);
		$str .= '</li>';

		return $str;
	}

/*----------------------------------------------------
	Content Boxes
----------------------------------------------------*/
add_shortcode('content_boxes', 'shortcode_content_boxes');
	function shortcode_content_boxes($atts, $content = null) {
		$str = '';
		$str .= '<section class="columns content-boxes">';
		$str .= do_shortcode($content);
		$str .= '</section>';

		return $str;
	}

/*----------------------------------------------------
	Content Box
----------------------------------------------------*/
add_shortcode('content_box', 'shortcode_content_box');
	function shortcode_content_box($atts, $content = null) {
		$str = '';
		if(!empty($atts['last']) && $atts['last'] == 'yes'):
		$str .= '<article class="col last">';
		else:
		$str .= '<article class="col">';
		endif;

		if($atts['image'] || $atts['title']):
			if(!empty($atts['image']) || !empty($atts['icon'])){
				$str .=	'<div class="heading heading-and-icon">';
			} else {
				$str .=	'<div class="heading">';
			}
		if($atts['image']):
		$str .= '<img src="'.$atts['image'].'" width="35" height="35" alt="">';
		endif;
		if(!empty($atts['icon']) && $atts['icon']):
			$str .= ''.do_shortcode('[fontawesome icon="'.$atts['icon'].'" circle="yes" size="medium"]').'';
		endif;
		if($atts['title']):
		$str .= '<h2>'.$atts['title'].'</h2>';
		endif;
		$str .= '</div>';
		endif;

		$str .= do_shortcode($content);
		
		if($atts['link'] && $atts['linktext']):
		$str .= '<span class="more"><a href="'.$atts['link'].'" target="'.$atts['linktarget'].'">'.$atts['linktext'].'</a></span>';
		endif;
		
		$str .= '</article>';

		return $str;
	}

/*----------------------------------------------------
	Slider
----------------------------------------------------*/
add_shortcode('slider', 'shortcode_slider');
	function shortcode_slider($atts, $content = null) {
		$str = '';
		$str .= '<div class="flexslider">';
		$str .= '<ul class="slides">';
		$str .= do_shortcode($content);
		$str .= '</ul>';
		$str .= '</div>';

		return $str;
	}

/*----------------------------------------------------
	Slide
----------------------------------------------------*/
add_shortcode('slide', 'shortcode_slide');
	function shortcode_slide($atts, $content = null) {
		$str = '';
		if(!empty($atts['type']) && $atts['type'] == 'video') {
			$str .= '<li class="full-video">';
		} else { 
			$str .= '<li class="image">';
		}
		if(!empty($atts['link']) && $atts['link']):
		$str .= '<a href="'.$atts['link'].'" target="'.$atts['linktarget'].'">';
		endif;
		if(!empty($atts['type']) && $atts['type'] == 'video') {
			$str .= do_shortcode($content);
		} else {
			$str .= '<img src="'.str_replace('&#215;', 'x', $content).'" alt="" />';
		}
		if(!empty($atts['link']) && $atts['link']):
		$str .= '</a>';
		endif;
		$str .= '</li>';

		return $str;
	}

/*----------------------------------------------------
	Testimonials
----------------------------------------------------*/
add_shortcode('testimonials', 'shortcode_testimonials');
	function shortcode_testimonials($atts, $content = null) {
		$str = '';
		$str .= '<div class="reviews">';
		$str .= do_shortcode($content);
		$str .= '</div>';

		return $str;
	}

/*----------------------------------------------------
	Testimonial
----------------------------------------------------*/
add_shortcode('testimonial', 'shortcode_testimonial');
	function shortcode_testimonial($atts, $content = null) {
		if(!isset($atts['gender'])) {
			$atts['gender'] = 'male';
		}
		$str = '';
		$str .= '<div class="review '.$atts['gender'].'">';
		$str .= '<blockquote>';
		$str .= '<q>';
		$str .= do_shortcode(''.$content.'');
		$str .= '</q>';
		if($atts['name']):
			$str .= '<div><span class="company-name">';
			$str .= '<strong>'.$atts['name'].'</strong>';
			if($atts['company']):
				if(!empty($atts['link']) && $atts['link']):
				$str .= '<a href="'.$atts['link'].'" target="'.$atts['target'].'">';
				endif;
				$str .= '<span>, '.$atts['company'].'</span>';
				if(!empty($atts['link']) && $atts['link']):
				$str .= '</a>';
				endif;
			endif;
			$str .= '</span></div>';
		endif;
		$str .= '</blockquote>';
		$str .= '</div>';

		return $str;
	}

	
/*----------------------------------------------------
	Progress Bar
----------------------------------------------------*/
add_shortcode('progress', 'shortcode_progress');
function shortcode_progress($atts, $content = null) {
	$html = '';
	$html .= '<div class="progress-bar">';
	$html .= '<div class="progress-bar-content" data-percentage="'.$atts['percentage'].'" style="width: ' . $atts['percentage'] . '%">';
	$html .= '</div>';
	$html .= '<span class="progress-title">' . $content . ' ' . $atts['percentage'] . '%</span>';
	$html .= '</div>';

	return $html;
}

/*----------------------------------------------------
	Team Member
----------------------------------------------------*/
add_shortcode('person', 'shortcode_person');
function shortcode_person($atts, $content = null) {
	$html = '';
	$html .= '<div class="person">';
	if($atts['picture']):
	$html .= '<img class="person-img" src="' . $atts['picture'] . '" alt="' . $atts['name'] . '" />';
	endif;
	if($atts['name'] || $atts['title'] || $atts['facebooklink'] || $atts['twitterlink'] || $atts['linkedinlink'] || $content) {
		$html .= '<div class="person-desc">';
			$html .= '<div class="person-author clearfix">';
				$html .= '<div class="person-author-wrapper"><span class="person-name">' . $atts['name'] . '</span>';
				$html .= '<span class="person-title">' . $atts['title'] . '</span></div>';
				if($atts['facebook']) {
					$html .= '<span class="social-icon"><a href="' . $atts['facebook'] . '" target="'.$atts['linktarget'].'" class="facebook">Facebook</a><div class="popup">
						<div class="holder">
							<p>Facebook</p>
						</div>
					</div></span>';
				}
				if($atts['twitter']) {
					$html .= '<span class="social-icon"><a href="' . $atts['twitter'] . '" target="'.$atts['linktarget'].'" class="twitter">Twitter</a><div class="popup">
						<div class="holder">
							<p>Twitter</p>
						</div>
					</div></span>';
				}
				if($atts['linkedin']) {
					$html .= '<span class="social-icon"><a href="' . $atts['linkedin'] . '" target="'.$atts['linktarget'].'" class="linkedin">LinkedIn</a><div class="popup">
						<div class="holder">
							<p>LinkedIn</p>
						</div>
					</div></span>';
				}
				if($atts['dribbble']) {
					$html .= '<span class="social-icon"><a href="' . $atts['dribbble'] . '" target="'.$atts['linktarget'].'" class="dribbble">Dribbble</a><div class="popup">
						<div class="holder">
							<p>Dribbble</p>
						</div>
					</div></span>';
				}
			$html .= '<div class="clear"></div></div>';
			$html .= '<div class="person-content">' . $content . '</div>';
		$html .= '</div>';
	}
	$html .= '</div>';

	return $html;
}

/*----------------------------------------------------
	Blog Posts
----------------------------------------------------*/
add_shortcode('recent_posts', 'shortcode_recent_posts');
function shortcode_recent_posts($atts, $content = null) {
	global $data;

	if(!isset($atts['columns'])) {
		$atts['columns'] = 3;
	}

	if(!isset($atts['excerpt_words'])) {
		$atts['excerpt_words'] = 15;
	}

	if(!isset($atts['number_posts'])) {
		$atts['number_posts'] = 3;
	}

	if(!isset($atts['strip_html'])) {
		$atts['strip_html'] = 'true';
	}

	$attachment = '';
	$html = '<div class="inhouse-container">';
	$html .= '<section class="columns columns-'.$atts['columns'].'" style="width:100%">';
	$html .= '<div class="holder">';
	if(!empty($atts['cat_id']) && $atts['cat_id']){
		$recent_posts = new WP_Query('showposts='.$atts['number_posts'].'&category_name='.$atts['cat_id']);
	} elseif(!empty($atts['cat_slug']) && $atts['cat_slug']){
		$recent_posts = new WP_Query('showposts='.$atts['number_posts'].'&category_name='.$atts['cat_slug']);
	} else {
		$recent_posts = new WP_Query('showposts='.$atts['number_posts']);
	}
	$count = 1;
	while($recent_posts->have_posts()): $recent_posts->the_post();
	$html .= '<article class="col">';
	if($atts['thumbnail'] == "yes"):
	if($data['legacy_posts_slideshow']):
	$args = array(
	    'post_type' => 'attachment',
	    'numberposts' => $data['posts_slideshow_number']-1,
	    'post_status' => null,
	    'post_mime_type' => 'image',
	    'post_parent' => get_the_ID(),
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'exclude' => get_post_thumbnail_id()
	);
	$attachments = get_posts($args);
	if($attachments || has_post_thumbnail() || get_post_meta(get_the_ID(), 'wired_video', true)):
	$html .= '<div class="flexslider floated-post-slideshow">';
		$html .= '<ul class="slides">';
			if(get_post_meta(get_the_ID(), 'wired_video', true)):
			$html .= '<li class="full-video">';
				$html .= get_post_meta(get_the_ID(), 'wired_video', true);
			$html .= '</li>';
			endif;
			if(has_post_thumbnail()):
			$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'recent-posts');
			$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
			$attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id());
			$html .= '<li>
				<a href="'.get_permalink(get_the_ID()).'" rel=""><img src="'.$attachment_image[0].'" alt="'.get_the_title().'" /></a>
			</li>';
			endif;
			if($data['posts_slideshow']):
			foreach($attachments as $attachment):
			$attachment_image = wp_get_attachment_image_src($attachment->ID, 'recent-posts');
			$full_image = wp_get_attachment_image_src($attachment->ID, 'full');
			$attachment_data = wp_get_attachment_metadata($attachment->ID);
			$html .= '<li>
				<a href="'.get_permalink(get_the_ID()).'" rel=""><img src="'. $attachment_image[0].'" alt="'.$attachment->post_title.'" /></a>
			</li>';
			endforeach;
			endif;
		$html .= '</ul>
	</div>';
	endif;
	else:
	if(has_post_thumbnail() || get_post_meta(get_the_ID(), 'wired_video', true)):
	$html .= '<div class="flexslider floated-post-slideshow">';
		$html .= '<ul class="slides">';
			if(get_post_meta(get_the_ID(), 'wired_video', true)):
			$html .= '<li class="full-video">';
				$html .= get_post_meta(get_the_ID(), 'wired_video', true);
			$html .= '</li>';
			endif;
			if(has_post_thumbnail()):
			$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'recent-posts');
			$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
			$attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id());
			$html .= '<li>
				<a href="'.get_permalink(get_the_ID()).'" rel=""><img src="'.$attachment_image[0].'" alt="'.get_the_title().'" /></a>
			</li>';
			endif;
			if($data['posts_slideshow']):
			$i = 2;
			while($i <= $data['posts_slideshow_number']):
			$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
			if($attachment_new_id):
			$attachment_image = wp_get_attachment_image_src($attachment_new_id, 'recent-posts');
			$full_image = wp_get_attachment_image_src($attachment_new_id, 'full');
			$attachment_data = wp_get_attachment_metadata($attachment_new_id);
			$html .= '<li>
				<a href="'.get_permalink(get_the_ID()).'" rel=""><img src="'. $attachment_image[0].'" alt="" /></a>
			</li>';
			endif; $i++; endwhile;
			endif;
		$html .= '</ul>
	</div>';
	endif;
	endif;
	endif;
	if($atts['title'] == "yes"):
	$html .= '<h3><a href="'.get_permalink(get_the_ID()).'">'.get_the_title().'</a></h3>';
	endif;
	if($atts['meta'] == "yes"):
	$html .= '<ul class="meta">';
	$html .= '<li><em class="date">'.get_the_time($data['date_format'], get_the_ID()).'</em></li>';
	if(get_comments_number(get_the_ID()) >= 1):
	$html .= '<li><a href="'.get_permalink(get_the_ID()).'">'.get_comments_number(get_the_ID()).' '.__('Comments', 'Inhouse').'</a></li>';
	endif;
	$html .= '</ul>';
	endif;
	if($atts['excerpt'] == "yes"):
	$stripped_content = tf_content( $atts['excerpt_words'], $atts['strip_html'] );
	$html .= '<p>'.$stripped_content.'</p>';
	endif;
	$html .= '</article>';
	$count++;
	endwhile;
	$html .= '</div>';
	$html .= '</section>';
	$html .= '</div>';

	return $html;
}

/*----------------------------------------------------
	Portfolio Posts
----------------------------------------------------*/
add_shortcode('recent_works', 'shortcode_recent_works');
function shortcode_recent_works($atts, $content = null) {
	global $data;

	$html = '';
	$html .= '<div class="related-posts related-projects">';
	$html .= '<div id="carousel" class="es-carousel-wrapper">';
	$html .= '<div class="es-carousel">';
	$html .= '<ul class="">';
					if(isset($atts['number_posts']) && !empty($atts['number_posts'])) {
						$number_posts = $atts['number_posts'];
					} else {
						$number_posts = 10;
					}
					$args = array(
						'post_type' => 'inhouse_portfolio',
						'paged' => 1,
						'posts_per_page' => $number_posts,
					);
					if(isset($atts['cat_id']) && !empty($atts['cat_id'])){
						$cat_id = explode(',', $atts['cat_id']);
						$args['tax_query'] = array(
							array(
								'taxonomy' => 'portfolio_category',
								'field' => 'slug',
								'terms' => $cat_id
							)
						);
					} elseif(isset($atts['cat_slug']) && !empty($atts['cat_slug'])){
						$cat_id = explode(',', $atts['cat_slug']);
						$args['tax_query'] = array(
							array(
								'taxonomy' => 'portfolio_category',
								'field' => 'slug',
								'terms' => $cat_id
							)
						);
					}
					$works = new WP_Query($args);
					while($works->have_posts()): $works->the_post();
					if(has_post_thumbnail()):
					$html .= '<li>';
						$html .= '<div class="image">';
								if($data['image_rollover']):
								$html .= get_the_post_thumbnail(get_the_ID(), 'related-img');
								else:
								$html .= '<a href="'.get_permalink(get_the_ID()).'">'.get_the_post_thumbnail(get_the_ID(), 'related-img').'</a>';
								endif;
								//$html .= '<a href="'.get_permalink(get_the_ID()).'">'.get_the_post_thumbnail(get_the_ID(), 'related-img').'</a>';
								$html .= '<div class="image-extras">';
									$html .= '<div class="image-extras-content">';
									$html .= '<a class="icon link-icon" style="margin-right:3px;" href="'.get_permalink(get_the_ID()).'">';
										$html .= 'Permalink';
									$html .= '</a>';
									$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
									if(get_post_meta(get_the_ID(), 'wired_video_url', true)) {
										$full_image[0] = get_post_meta(get_the_ID(), 'wired_video_url', true);
									}
									$html .= '<a class="icon gallery-icon" href="'.$full_image[0].'" rel="prettyPhoto[gallery<?php echo get_the_ID(); ?>]">Gallery</a>';
									$html .= '<h3>'.get_the_title().'</h3>';
									$html .= '</div>
								</div>
						</div>
					</li>';
					endif; endwhile;
				$html .= '</ul>
			</div>
		</div>
	</div>';

	return $html;
}


/*----------------------------------------------------
	Alerts
----------------------------------------------------*/
add_shortcode('alert', 'shortcode_alert');
function shortcode_alert($atts, $content = null) {
	$html = '';
	$html .= '<div class="alert '.$atts['type'].'">';
		$html .= '<div class="msg">'.do_shortcode($content).'</div>';
		$html .= '<a href="#" class="toggle-alert">Toggle</a>';
	$html .= '</div>';

	return $html;
}

/*----------------------------------------------------
	FontAwesome Icons
----------------------------------------------------*/
add_shortcode('fontawesome', 'shortcode_fontawesome');
function shortcode_fontawesome($atts, $content = null) {
	$html = '';
	$html .= '<i class="fontawesome-icon '.$atts['size'].' circle-'.$atts['circle'].' icon-'.$atts['icon'].'"></i>';

	return $html;
}

/*----------------------------------------------------
	Social Icons
----------------------------------------------------*/
add_shortcode('social_links', 'shortcode_social_links');
function shortcode_social_links($atts, $content = null) {
	$html = '<div class="social_links_shortcode clearfix">';
	$html .= '<ul class="social-networks clearfix">';
	foreach($atts as $key => $link) {
		if($link && $key != 'linktarget') {
			$html .= '<li class="'.$key.'">
			<a class="'.$key.'" href="'.$link.'" target="'.$atts['linktarget'].'">'.ucwords($key).'</a>
			<div class="popup">
				<div class="holder">
					<p>'.ucwords($key).'</p>
				</div>
			</div>
			</li>';
		}
	}
	$html .= '</ul>';
	$html .= '</div>';

	return $html;
}

/*----------------------------------------------------
	Clients Carousel
----------------------------------------------------*/
add_shortcode('clients', 'shortcode_clients');
function shortcode_clients($atts, $content = null) {
	$html = '<div class="related-posts related-projects"><div id="carousel" class="clients-carousel es-carousel-wrapper"><div class="es-carousel"><ul>';
	$html .= do_shortcode($content);
	$html .= '</ul></div></div></div>';
	return $html;
}

/*----------------------------------------------------
	Client
----------------------------------------------------*/
add_shortcode('client', 'shortcode_client');
function shortcode_client($atts, $content = null) {
	$html = '<li>';
	$html .= '<a href="'.$atts['link'].'" target="'.$atts['linktarget'].'"><img src="'.$atts['image'].'" alt="" /></a>';
	$html .= '</li>';
	return $html;
}

/*----------------------------------------------------
	Headings
----------------------------------------------------*/
add_shortcode('title', 'shortcode_title');
function shortcode_title($atts, $content = null) {
	$html = '';
	$html .= '<div class="title"><h'.$atts['size'].'>'.do_shortcode($content).'</h'.$atts['size'].'></div>';
	return $html;
}

/*----------------------------------------------------
	Divider
----------------------------------------------------*/
add_shortcode('separator', 'shortcode_separator');
function shortcode_separator($atts, $content = null) {
	$html = '';
	$html .= '<div class="demo-sep" style="margin-top: '.$atts['top'].'px;"></div>';
	return $html;
}

/*----------------------------------------------------
	Add shortcode buttons to the post editor
----------------------------------------------------*/
add_action('init', 'add_button');
add_action('init', 'add_button_2');

function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons_3', 'register_button');  
   }  
}  

function add_button_2() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin_2');  
     add_filter('mce_buttons_4', 'register_button_2');  
   }  
}  

function register_button($buttons) {
   array_push($buttons, "youtube", "vimeo", "soundcloud", "button", "dropcap", "highlight", "checklist", "tabs", "toggle", "one_half", "one_third", "two_third", "one_fourth", "three_fourth", "slider", "testimonial");  
   return $buttons;
}  

function register_button_2($buttons) {
   array_push($buttons, "social_links", "clients", "title", "separatoor", "tfprettyphoto", "progress", "person", "alert", "pricing_table", "recent_works", "company_pitch", "content_boxes", "recent_posts", "fontawesome");
   return $buttons;
}  

function add_plugin($plugin_array) {  
   $plugin_array['youtube'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['vimeo'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['soundcloud'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['button'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['dropcap'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['highlight'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['checklist'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['tabs'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['toggle'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['one_half'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['one_third'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['two_third'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['one_fourth'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['three_fourth'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['slider'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['testimonial'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';

   return $plugin_array;  
}

function add_plugin_2($plugin_array) {
   $plugin_array['progress'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['person'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['alert'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['pricing_table'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['recent_works'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['company_pitch'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['content_boxes'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['recent_posts'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['fontawesome'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['social_links'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['clients'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['title'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['separatoor'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';
   $plugin_array['tfprettyphoto'] = get_template_directory_uri().'/admin/editor/tinymce/editor-buttons.js';

   return $plugin_array;  
}