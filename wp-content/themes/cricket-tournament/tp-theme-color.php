<?php

$cricket_tournament_tp_theme_css = '';
//preloader//

$cricket_tournament_tp_preloader_color1_option = get_theme_mod('cricket_tournament_tp_preloader_color1_option');
$cricket_tournament_tp_preloader_color2_option = get_theme_mod('cricket_tournament_tp_preloader_color2_option');
$cricket_tournament_tp_preloader_bg_option = get_theme_mod('cricket_tournament_tp_preloader_bg_option');


if($cricket_tournament_tp_preloader_color1_option != false){
$cricket_tournament_tp_theme_css .='.center1{';
	$cricket_tournament_tp_theme_css .='border-color: '.esc_attr($cricket_tournament_tp_preloader_color1_option).' !important;';
$cricket_tournament_tp_theme_css .='}';
}
if($cricket_tournament_tp_preloader_color1_option != false){
$cricket_tournament_tp_theme_css .='.center1 .ring::before{';
	$cricket_tournament_tp_theme_css .='background: '.esc_attr($cricket_tournament_tp_preloader_color1_option).' !important;';
$cricket_tournament_tp_theme_css .='}';
}
if($cricket_tournament_tp_preloader_color2_option != false){
$cricket_tournament_tp_theme_css .='.center2{';
	$cricket_tournament_tp_theme_css .='border-color: '.esc_attr($cricket_tournament_tp_preloader_color2_option).' !important;';
$cricket_tournament_tp_theme_css .='}';
}
if($cricket_tournament_tp_preloader_color2_option != false){
$cricket_tournament_tp_theme_css .='.center2 .ring::before{';
	$cricket_tournament_tp_theme_css .='background: '.esc_attr($cricket_tournament_tp_preloader_color2_option).' !important;';
$cricket_tournament_tp_theme_css .='}';
}
if($cricket_tournament_tp_preloader_bg_option != false){
$cricket_tournament_tp_theme_css .='.loader{';
	$cricket_tournament_tp_theme_css .='background: '.esc_attr($cricket_tournament_tp_preloader_bg_option).';';
$cricket_tournament_tp_theme_css .='}';
}

// footer-bg-color
$cricket_tournament_tp_footer_bg_color_option = get_theme_mod('cricket_tournament_tp_footer_bg_color_option');

if($cricket_tournament_tp_footer_bg_color_option != false){
$cricket_tournament_tp_theme_css .='#footer{';
	$cricket_tournament_tp_theme_css .='background: '.esc_attr($cricket_tournament_tp_footer_bg_color_option).' !important;';
$cricket_tournament_tp_theme_css .='}';
}
