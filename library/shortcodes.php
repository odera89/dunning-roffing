<?php

class AddShortcode {

	public function __construct( $Object ) {
		$button = add_shortcode( 'button', array( $Object, 'button' ) );
		$row = add_shortcode( 'row', array( $Object, 'row' ) );
		$col = add_shortcode( 'col', array( $Object, 'col' ) );
		$contact_google_map = add_shortcode( 'contact_google_map', array( $Object, 'contact_google_map' ) );
		$modal = add_shortcode( 'modal', array( $Object, 'modal' ) );
		$full_size_image = add_shortcode( 'full_size_image', array( $Object, 'full_size_image' ) );
		$shortcode_empty_paragraph_fix = add_filter( 'the_content', array( $Object, 'shortcode_empty_paragraph_fix' ) );
	}
}

class ShortcodeInit {

	//Shortcode Empty Paragraph Fix
	public function shortcode_empty_paragraph_fix( $content ) {
    // define your shortcodes to filter, '' filters all shortcodes
    $shortcodes = array( 'row', 'col' );
    foreach ( $shortcodes as $shortcode ) {
        $array = array (
            '<p>[' . $shortcode => '[' .$shortcode,
            '<p>[/' . $shortcode => '[/' .$shortcode,
            $shortcode . ']</p>' => $shortcode . ']',
            $shortcode . ']<br />' => $shortcode . ']'
        );
        $content = strtr( $content, $array );
    }
    return $content;
	}

	// BUTTON
	public function button($atts,$content)
	{
		$values = shortcode_atts(array(
			'size' => '',
			'class' => '',
			'link' => '#',
			'target' => '',
		),$atts);

		$target = $values['target'] ? 'target="'.$values['target'].'"' : '';

		$content = '<a href="'.$values['link'].'" class="button '.$values['class'].' '.$values['size'].'" '.$target.'>' . $content . '</a>';

		return $content;
	}

	// ROW
	public function row($atts,$content)
	{
		$values = shortcode_atts(array(
			'class' => '',
		),$atts);

		$content = '<div class="row '.$values['class'].'">' . do_shortcode($content) . '</div>';

		return $content;
	}

	// COLUMN
	public function col($atts,$content=null)
	{
		$values = shortcode_atts(array(
			'count' => 6,
			'class' => '',
		),$atts);

		$html = '<div class="small-12 medium-'.$values['count'].' columns '.trim($values['class']).'">';
		$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}

	// CONTACT GOOGLE MAP
	public function contact_google_map($atts,$content)
	{
		$values = shortcode_atts(array(
			'class' => '',
		),$atts);

		$content = '<div id="gmap" style="height: 500px;"></div>';

		return $content;
	}

	// MODAL
	public function modal($atts,$content=null)
	{
		$values = shortcode_atts(array(
			'id' => '',
			'button_label' => ''
		),$atts);
		$html = '<p><a data-open="'.$values['id'].'">'.$values['button_label'].'</a></p>';
		$html .= '<div class="reveal large" id="'.$values['id'].'" data-reveal>';
		$html .= do_shortcode($content);
		$html .='<button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>';
		$html .= '</div>';

		return $html;
	}

	// FULL SIZE IMAGE ON POSTS
	public function full_size_image($atts,$content = null) {
		$values = shortcode_atts(array(
			'id' => '',
		),$atts);

		$image_url = wp_get_attachment_url( $values['id'] );

		$content = '<img class="full-size wp-image-1038 parallaximg" src="'.$image_url.'" alt="full-size-image" />';

		return $content;
	}
}

$Shortcode = new ShortcodeInit();
$Init = new AddShortcode( $Shortcode );

// ADD Image button
// add_action('media_buttons', 'add_full_size_image_media_button');
// function add_full_size_image_media_button() {
//     echo '<a href="#" id="add_full_size_image" class="button">Add Full Size Image</a>';
// }

// add_action('media_buttons', 'add_full_size_image_with_text_media_button');
// function add_full_size_image_with_text_media_button() {
//     echo '<a href="#" id="add_full_size_image_with_text" class="button">Add Full Size Image with Text</a>';
// }

// function include_media_button_js_file() {
//     wp_enqueue_script('media_button', get_template_directory_uri().'/assets/js/media_button.js', array('jquery'), '1.0', true);
// }
// add_action('wp_enqueue_media', 'include_media_button_js_file');