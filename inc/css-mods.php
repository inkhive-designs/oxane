<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function oxane_custom_css_mods() {



    echo "<style id='custom-css-mods'>";
	
	//If Highlighting Nav active item is disabled
	if ( get_theme_mod('oxane_disable_active_nav') ) :
		echo "#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a { border:none; background: inherit; }"; 
	endif;


	if ( get_background_color() ) {
		echo "#social-search .searchform:before { border-left-color: #".get_background_color()." }";
		echo "#social-search .searchform, #social-search .searchform:after { background: #".get_background_color()." }";
	}
	
	if ( get_theme_mod('oxane_title_font','HIND') ) :
		echo ".title-font, h1, h2 { font-family: ".esc_html(get_theme_mod('oxane_title_font'))."; }";
	endif;
	
	if ( get_theme_mod('oxane_body_font','Open Sans') ) :
		echo "body { font-family: ".esc_html(get_theme_mod('oxane_body_font'))."; }";
	endif;


	if ( get_header_textcolor() ) :
		echo "#masthead h1.site-title a { color: #".get_header_textcolor()."; }";
	endif;
	
	
	if ( get_theme_mod('oxane_header_desccolor','#000000') ) :
		echo "#masthead h2.site-description { color: ".esc_html(get_theme_mod('oxane_header_desccolor','#000'))."; }";
	endif;

    if ( get_theme_mod('oxane_hide_title_tagline', true) ) :
        echo "#masthead .site-branding #text-title-desc { display: none; }";
    endif;

    if(!is_home() && is_front_page()):
        if( get_theme_mod('oxane_page_title', true)):
            echo "#primary-mono .entry-header { display:none; }";
        endif;
    endif;

    if (!is_home() && is_front_page()) :
        if ( get_theme_mod('oxane_content_font_size') ) :
            $size = (get_theme_mod('oxane_content_font_size'));
            echo "#primary-mono .entry-content { font-size:".$size.";}";
        endif;
    endif;

    if (get_theme_mod('oxane_hero_background_image') != '') :
        $image = get_theme_mod('oxane_hero_background_image');
        echo "#hero {
                    	background-image: url('" . $image . "');
                        background-size: cover;
                }";
    endif;

    if (get_theme_mod('oxane_hero_background_image')) :
        $image1 = get_theme_mod('oxane_hero2_background_image');
        echo "#hero2 {
                    background-image: url('" . $image1 . "');
                    background-size: cover;
                }";
    endif;	

	echo "</style>";
}

add_action('wp_head', 'oxane_custom_css_mods');