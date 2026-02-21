<?php
/**
 * Lollum
 * 
 * Core functions and definitions
 *
 * @package WordPress
 * @subpackage Lollum Framework
 * @author Lollum <support@lollum.com>
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

/******************************
* case section description
******************************/

function lolfmk_case_sectiondescription($type, $name, $message) {
	echo '<div class="section section-'.$type.'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<div class="section-description"><p>'.esc_html($message).'</p></div>';
	echo '<br></div>';
	echo '<div class="explain"></div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case section title
******************************/

function lolfmk_case_sectiontitle($name) {
	echo '<h4 class="section-title">'.esc_html($name).'</h4>';
}


/******************************
* case text
******************************/

function lolfmk_case_text($type, $id, $std, $name, $desc, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<input type="text" name="'.esc_attr($id).'" id="'.esc_attr($id).'" value="'.esc_attr($val).'">';
	echo '<br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case hidden field
******************************/

function lolfmk_case_text_hidden($id, $std, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<input type="hidden" name="'.esc_attr($id).'" id="'.esc_attr($id).'" value="'.esc_attr($val).'">';
}

/******************************
* case love meta
******************************/

function lolfmk_case_meta_love($id, $std, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<input type="hidden" name="'.esc_attr($id).'" id="'.esc_attr($id).'" value="'.esc_attr($val).'">';
}

/******************************
* case textarea
******************************/

function lolfmk_case_textarea($type, $id, $std, $name, $desc, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<textarea name="'.esc_attr($id).'" id="'.esc_attr($id).'" cols="5" rows="8">'.esc_textarea($val).'</textarea>';
	echo '<br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case select
******************************/

function lolfmk_case_select($type, $id, $std, $name, $desc, $options, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo'<select name="'.esc_attr($id).'">';
	foreach ($options as $option) {
		echo'<option';
		if ($meta == $option) { 
			echo ' selected="selected"'; 
		}
		echo'>'.esc_html($option).'</option>';
	} 
	echo'</select>';
	echo '<br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case checkbox
******************************/

function lolfmk_case_checkbox($type, $id, $std, $name, $desc, $meta) {
	$val = $meta ? $meta : $std;
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<input type="checkbox" name="'.esc_attr($id).'" id="'.esc_attr($id).'" value="yes"';
	if ($val == 'yes') {
		echo "checked='yes'";
	} else {
		echo "";
	}
	echo '><br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case multicheckbox
******************************/

function lolfmk_case_multicheckbox($type, $id, $std, $name, $desc, $options, $meta) {
	$val = $meta ? $meta : array($std);
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	foreach ($options as $key => $option) {
		echo '<input type="checkbox" name="'.esc_attr($id).'[]" id="'.esc_attr($id).'_'.esc_attr($key).'" value="'.esc_attr($key).'"';
		if (in_array($key, $val)) {
			echo "checked='yes'";
		} else {
			echo "";
		}
		echo '><label class="label-multicheck" for="'.esc_attr($key).'">'.esc_html($option).'</label><br><br>';
	}
	echo '</div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case multicheckbox taxonomy
******************************/

function lolfmk_case_multicheckbox_taxonomy($type, $id, $std, $name, $desc, $meta) {
	$val = $meta ? $meta : array($std);
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	$terms = get_terms("portfolio-categories");
	foreach ($terms as $term) {
		echo '<input type="checkbox" name="'.esc_attr($id).'[]" id="'.esc_attr($id).'_'.esc_attr($term->term_id).'" value="'.esc_attr($term->term_id).'"';
		if (in_array($term->term_id, $val)) {
			echo "checked='yes'";
		} else {
			echo "";
		}
		echo '><label class="label-multicheck" for="'.esc_attr($term->term_id).'">'.esc_attr($term->name).'</label><br><br>';
	}
	echo '</div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case upload
******************************/

function lolfmk_case_upload($type, $id, $std, $name, $desc, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<input type="text" name="'.esc_attr($id).'" id="'.esc_attr($id).'" value="'.esc_attr($val).'"><br>';
	echo '<input type="button" class="upload-button" name="'.esc_attr($id).'" id="'.esc_attr($id).'"value="Upload">';
	echo '<br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case upload video
******************************/

function lolfmk_case_upload_video($type, $id, $std, $name, $desc, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<input type="text" name="'.esc_attr($id).'" id="'.esc_attr($id).'" value="'.esc_attr($val).'"><br>';
	echo '<input type="button" class="upload-button-video" name="'.esc_attr($id).'" id="'.esc_attr($id).'"value="Upload">';
	echo '<br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case upload audio
******************************/

function lolfmk_case_upload_audio($type, $id, $std, $name, $desc, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<input type="text" name="'.esc_attr($id).'" id="'.esc_attr($id).'" value="'.esc_attr($val).'"><br>';
	echo '<input type="button" class="upload-button-audio" name="'.esc_attr($id).'" id="'.esc_attr($id).'"value="Upload">';
	echo '<br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case upload image
******************************/

function lolfmk_case_upload_image($type, $id, $std, $name, $desc, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<input type="text" name="'.esc_attr($id).'" id="'.esc_attr($id).'" value="'.esc_attr($val).'"><br>';
	echo '<input type="button" class="upload-button-image" name="'.esc_attr($id).'" id="'.esc_attr($id).'"value="Upload">';
	echo '<br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case upload gallery
******************************/

function lolfmk_case_upload_gallery($type, $id, $std, $name, $desc, $meta) {
	$val = $meta ? $meta : $std;
	$val = stripslashes(htmlspecialchars($val, ENT_QUOTES));
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<input type="text" name="'.esc_attr($id).'" id="'.esc_attr($id).'" value="'.esc_attr($val).'"><br>';
	echo '<input type="button" class="upload-button-gallery" name="'.esc_attr($id).'" id="'.esc_attr($id).'"value="Select images">';
	echo '<br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}


/******************************
* case color
******************************/

function lolfmk_case_color($type, $id, $std, $name, $desc, $meta) {
	$val = $std;
	$stored  = $meta;
	if ($stored != "") { 
		$val = $stored; 
	}
	echo '<div class="section section-'.esc_attr($type).'">';
	echo '<h4 class="heading">'.esc_html($name).'</h4>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<div id="'.esc_attr($id).'_picker" class="colorSelector"><div></div></div>';
	echo '<input class="lol-color" name="'.esc_attr($id).'" id="'.esc_attr($id).'" type="text" value="'.esc_attr($val).'">';
	echo '<br></div>';
	echo '<div class="explain">'.esc_html($desc).'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';
	echo '</div>';
}
