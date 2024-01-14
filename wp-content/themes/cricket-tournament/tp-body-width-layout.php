<?php

$cricket_tournament_tp_theme_css = "";

//scroll-top-alignmemt
$cricket_tournament_scroll_position = get_theme_mod( 'cricket_tournament_scroll_top_position','Right');
if($cricket_tournament_scroll_position == 'Right'){
$cricket_tournament_tp_theme_css .='#return-to-top{';
    $cricket_tournament_tp_theme_css .='right: 20px;';
$cricket_tournament_tp_theme_css .='}';
}else if($cricket_tournament_scroll_position == 'Left'){
$cricket_tournament_tp_theme_css .='#return-to-top{';
    $cricket_tournament_tp_theme_css .='left: 20px;';
$cricket_tournament_tp_theme_css .='}';
}else if($cricket_tournament_scroll_position == 'Center'){
$cricket_tournament_tp_theme_css .='#return-to-top{';
    $cricket_tournament_tp_theme_css .='right: 50%;left: 50%;';
$cricket_tournament_tp_theme_css .='}';
}


//Social icon Font size
$cricket_tournament_social_icon_fontsize = get_theme_mod('cricket_tournament_social_icon_fontsize');
$cricket_tournament_tp_theme_css .='.media-links a i{';
	$cricket_tournament_tp_theme_css .='font-size: '.esc_attr($cricket_tournament_social_icon_fontsize).'px;';
$cricket_tournament_tp_theme_css .='}';

// site title font size option
$cricket_tournament_site_title_font_size = get_theme_mod('cricket_tournament_site_title_font_size', 20);{
$cricket_tournament_tp_theme_css .='.logo h1 a, .logo p a{';
	$cricket_tournament_tp_theme_css .='font-size: '.esc_attr($cricket_tournament_site_title_font_size).'px;';
$cricket_tournament_tp_theme_css .='}';
}

// site tagline font size option
$cricket_tournament_site_tagline_font_size = get_theme_mod('cricket_tournament_site_tagline_font_size', 15);{
$cricket_tournament_tp_theme_css .='.logo p{';
	$cricket_tournament_tp_theme_css .='font-size: '.esc_attr($cricket_tournament_site_tagline_font_size).'px;';
$cricket_tournament_tp_theme_css .='}';
}

// return to header mobile width
$cricket_tournament_return_to_header_mob = get_theme_mod( 'cricket_tournament_return_to_header_mob',false);
if($cricket_tournament_return_to_header_mob == true && get_theme_mod( 'cricket_tournament_return_to_header',true) != true){
$cricket_tournament_tp_theme_css .='.return-to-header{';
	$cricket_tournament_tp_theme_css .='display:none;';
$cricket_tournament_tp_theme_css .='} ';
}
if($cricket_tournament_return_to_header_mob == true){
$cricket_tournament_tp_theme_css .='@media screen and (max-width:575px) {';
$cricket_tournament_tp_theme_css .='.return-to-header{';
	$cricket_tournament_tp_theme_css .='display:block;';
$cricket_tournament_tp_theme_css .='} }';
}else if($cricket_tournament_return_to_header_mob == false){
$cricket_tournament_tp_theme_css .='@media screen and (max-width:575px){';
$cricket_tournament_tp_theme_css .='.return-to-header{';
	$cricket_tournament_tp_theme_css .='display:none;';
$cricket_tournament_tp_theme_css .='} }';
}

// slider button mobile width
$cricket_tournament_slider_buttom_mob = get_theme_mod( 'cricket_tournament_slider_buttom_mob',true);
if($cricket_tournament_slider_buttom_mob == true && get_theme_mod( 'cricket_tournament_slider_button',true) != true){
$cricket_tournament_tp_theme_css .='#slider .more-btn{';
	$cricket_tournament_tp_theme_css .='display:none;';
$cricket_tournament_tp_theme_css .='} ';
}
if($cricket_tournament_slider_buttom_mob == true){
$cricket_tournament_tp_theme_css .='@media screen and (max-width:575px) {';
$cricket_tournament_tp_theme_css .='#slider .more-btn{';
	$cricket_tournament_tp_theme_css .='display:block;';
$cricket_tournament_tp_theme_css .='} }';
}else if($cricket_tournament_slider_buttom_mob == false){
$cricket_tournament_tp_theme_css .='@media screen and (max-width:575px){';
$cricket_tournament_tp_theme_css .='#slider .more-btn{';
	$cricket_tournament_tp_theme_css .='display:none;';
$cricket_tournament_tp_theme_css .='} }';
}

//footer bg image
$cricket_tournament_footer_widget_image = get_theme_mod('cricket_tournament_footer_widget_image');
if($cricket_tournament_footer_widget_image != false){
$cricket_tournament_tp_theme_css .='#footer{';
	$cricket_tournament_tp_theme_css .='background: url('.esc_attr($cricket_tournament_footer_widget_image).');';
$cricket_tournament_tp_theme_css .='}';
}

//related products
$cricket_tournament_related_product = get_theme_mod('cricket_tournament_related_product',true);
if($cricket_tournament_related_product == false){
	$cricket_tournament_tp_theme_css .='.related.products{';
		$cricket_tournament_tp_theme_css .='display: none;';
	$cricket_tournament_tp_theme_css .='}';
}

//menu font size
$cricket_tournament_menu_font_size = get_theme_mod('cricket_tournament_menu_font_size', 15);{
$cricket_tournament_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after, .main-navigation li.menu-item-has-children:after{';
	$cricket_tournament_tp_theme_css .='font-size: '.esc_attr($cricket_tournament_menu_font_size).'px;';
$cricket_tournament_tp_theme_css .='}';
}

// menu text transform
$cricket_tournament_menu_text_tranform = get_theme_mod( 'cricket_tournament_menu_text_tranform','Capitalize');
if($cricket_tournament_menu_text_tranform == 'Uppercase'){
$cricket_tournament_tp_theme_css .='.main-navigation a {';
	$cricket_tournament_tp_theme_css .='text-transform: uppercase;';
$cricket_tournament_tp_theme_css .='}';
}else if($cricket_tournament_menu_text_tranform == 'Lowercase'){
$cricket_tournament_tp_theme_css .='.main-navigation a {';
	$cricket_tournament_tp_theme_css .='text-transform: lowercase;';
$cricket_tournament_tp_theme_css .='}';
}
else if($cricket_tournament_menu_text_tranform == 'Capitalize'){
$cricket_tournament_tp_theme_css .='.main-navigation a {';
	$cricket_tournament_tp_theme_css .='text-transform: capitalize;';
$cricket_tournament_tp_theme_css .='}';
}
//======================= slider Content layout ===================== //

$cricket_tournament_slider_content_layout = get_theme_mod('cricket_tournament_slider_content_layout', 'CENTER-ALIGN'); 
$cricket_tournament_tp_theme_css .= '#slider .carousel-caption{';
switch ($cricket_tournament_slider_content_layout) {
    case 'LEFT-ALIGN':
        $cricket_tournament_tp_theme_css .= 'text-align:left; right: 35%; left: 15%';
        break;
    case 'CENTER-ALIGN':
        $cricket_tournament_tp_theme_css .= 'text-align:center; left: 15%; right: 15%';
        break;
    case 'RIGHT-ALIGN':
        $cricket_tournament_tp_theme_css .= 'text-align:right; left: 35%; right: 15%';
        break;
    default:
        $cricket_tournament_tp_theme_css .= 'text-align:left; right: 35%; left: 15%';
        break;
}
$cricket_tournament_tp_theme_css .= '}';