<?php
class PyreThemeFrameworkMetaboxes {
	
	public function __construct()
	{
		global $data;
		$this->data = $data;

		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}

	// Load backend scripts
	function admin_script_loader() {
		global $pagenow;
		if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')) {
	    	wp_register_script('inhouse_upload', get_bloginfo('template_directory').'/js/upload.js');
	    	wp_enqueue_script('inhouse_upload');
	    	wp_enqueue_script('media-upload');
	    	wp_enqueue_script('thickbox');
	   		wp_enqueue_style('thickbox');
		}
	}
	
	public function add_meta_boxes()
	{
		$this->add_meta_box('post_options', 'Post Options', 'post');
		$this->add_meta_box('page_options', 'Page Options', 'page');
		$this->add_meta_box('portfolio_options', 'Portfolio Options', 'inhouse_portfolio');

		$this->add_meta_box('es_options', 'Elastic Slide Options', 'wiredthemes_elastic');
	}
	
	public function add_meta_box($id, $label, $post_type)
	{
	    add_meta_box( 
	        'wired_' . $id,
	        $label,
	        array($this, $id),
	        $post_type
	    );
	}
	
	public function save_meta_boxes($post_id)
	{
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		
		foreach($_POST as $key => $value) {
			if(strstr($key, 'wired_')) {
				update_post_meta($post_id, $key, $value);
			}
		}
	}

	public function post_options()
	{
		$data = $this->data;
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/post_options.php';
	}

	public function page_options()
	{
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/page_options.php';
	}

	public function portfolio_options()
	{	
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/portfolio_options.php';
	}
	
	public function es_options()
	{	
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/es_options.php';
	}

	public function text($id, $label, $desc = '')
	{
		global $post;
		
		$html = '';
		$html .= '<div class="wired_metabox_field">';
			$html .= '<label for="wired_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<input type="text" id="wired_' . $id . '" name="wired_' . $id . '" value="' . get_post_meta($post->ID, 'wired_' . $id, true) . '" />';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}
	
	public function select($id, $label, $options, $desc = '')
	{
		global $post;
		
		$html = '';
		$html .= '<div class="wired_metabox_field">';
			$html .= '<label for="wired_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<select id="wired_' . $id . '" name="wired_' . $id . '">';
				foreach($options as $key => $option) {
					if(get_post_meta($post->ID, 'wired_' . $id, true) == $key) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}
					
					$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
				}
				$html .= '</select>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}

	public function multiple($id, $label, $options, $desc = '')
	{
		global $post;
		
		$html = '';
		$html .= '<div class="wired_metabox_field">';
			$html .= '<label for="wired_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<select multiple="multiple" id="wired_' . $id . '" name="wired_' . $id . '[]">';
				foreach($options as $key => $option) {
					if(is_array(get_post_meta($post->ID, 'wired_' . $id, true)) && in_array($key, get_post_meta($post->ID, 'wired_' . $id, true))) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}
					
					$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
				}
				$html .= '</select>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}

	public function textarea($id, $label, $desc = '')
	{
		global $post;

		$html = '';
		$html = '';
		$html .= '<div class="wired_metabox_field">';
			$html .= '<label for="wired_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<textarea cols="120" rows="10" id="wired_' . $id . '" name="wired_' . $id . '">' . get_post_meta($post->ID, 'wired_' . $id, true) . '</textarea>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}

	public function upload($id, $label, $desc = '')
	{
		global $post;

		$html = '';
		$html = '';
		$html .= '<div class="wired_metabox_field">';
			$html .= '<label for="wired_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
			    $html .= '<input name="wired_' . $id . '" class="upload_field" id="wired_' . $id . '" type="text" value="' . get_post_meta($post->ID, 'wired_' . $id, true) . '" />';
			    $html .= '<input class="upload_button" type="button" value="Browse" />';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}
	
}

$metaboxes = new PyreThemeFrameworkMetaboxes;