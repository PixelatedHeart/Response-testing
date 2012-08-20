<?php
/**
* Initializes the Response Theme Options
*
* Author: Tyler Cunningham
* Copyright: &#169; 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Response 
* @since 1.0.4
*/

require( get_template_directory() . '/core/classy-options/classy-options-framework/classy-options-framework.php');

add_action('init', 'chimps_init_options');

function chimps_init_options() {

global $options, $themeslug, $themename, $themenamefull;
$options = new ClassyOptions($themename, $themenamefull." Options");

$terms2 = get_terms('category', 'hide_empty=0');

	$blogoptions = array();
                                    
	$blogoptions['all'] = "All";

    	foreach($terms2 as $term) {

        	$blogoptions[$term->slug] = $term->name;

        }
$options
	->section("Diseño")
		->open_outersection()
			->checkbox($themeslug."_responsive_video", "Vídeos responsivos (cambian de tamaño en formatos móviles)")
		->close_outersection()
		->subsection("Tipografías")
			->select($themeslug."_font", "Selecciona uan fuente", array( 'options' => array("Arial" => "Arial (por defecto)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))
		->subsection_end()
		->open_outersection()
				->textarea($themeslug."_css_options", "CSS personalizada")
			->close_outersection()
		->section("Cabecera")
		->open_outersection()
			->section_order("header_section_order", "Elementos Drag & Drop", array('options' => array("response_logo_icons" => "Logo + Iconos sociales", "response_banner" => "Banner", "response_custom_header_element" => "HTML Personalizado", "response_navigation" => "Menú"), 'default' => 'response_logo_icons,response_navigation'))	
			->textarea($themeslug."_custom_header_element", "HTML Personalizado")
		->close_outersection()
		->subsection("Opciones de banner")
			->upload($themeslug."_banner", "Imagen")
			->text($themeslug."_banner_url", "URL a la que enlaza", array('default' => home_url()))
		->subsection_end()		
			->subsection("Opciones de cabecera")
			->checkbox($themeslug."_custom_logo", "Logo" , array('default' => true))
			->upload($themeslug."_logo", "Logo", array('default' => array('url' => TEMPLATE_URL . '/images/responselogo.png')))
			->checkbox($themeslug."_favicon_toggle", "Favicon" , array('default' => false))
			->upload($themeslug."_favicon", "Favicon personalizado", array('default' => array('url' => TEMPLATE_URL . '/images/favicon.ico')))
			->upload($themeslug."_apple_touch", "Icono para acceso directo en dispositivos Apple", array('default' => array('url' => TEMPLATE_URL . '/images/apple-icon.png')))
		->subsection_end()
		->subsection("Social")
			->images($themeslug."_icon_style", "Set de iconos", array( 'options' => array('legacy' => TEMPLATE_URL . '/images/social/thumbs/icons-classic.png', 'default' =>
TEMPLATE_URL . '/images/social/thumbs/icons-default.png' ), 'default' => 'default' ) )
			->text($themeslug."_twitter", "Twitter URL", array('default' => 'http://twitter.com'))
			->checkbox($themeslug."_hide_twitter_icon", "Esconder icono de Twitter", array('default' => true))
			->text($themeslug."_facebook", "Facebook URL", array('default' => 'http://facebook.com'))
			->checkbox($themeslug."_hide_facebook_icon", "Esconder icono de Facebook" , array('default' => true))
			->text($themeslug."_gplus", "Google + URL", array('default' => 'http://plus.google.com'))
			->checkbox($themeslug."_hide_gplus_icon", "Esconder icono de Google +" , array('default' => true))
			->text($themeslug."_flickr", "Flickr URL", array('default' => 'http://flikr.com'))
			->checkbox($themeslug."_hide_flickr", "Esconder icono de Flickr")
			->text($themeslug."_linkedin", "LinkedIn URL", array('default' => 'http://linkedin.com'))
			->checkbox($themeslug."_hide_linkedin", "Esconder icono de LinkedIn")
			->text($themeslug."_pinterest", "Pinterest URL", array('default' => 'http://pinterest.com'))
			->checkbox($themeslug."_hide_pinterest", "Esconder icono de Pinterest")
			->text($themeslug."_youtube", "YouTube URL", array('default' => 'http://youtube.com'))
			->checkbox($themeslug."_hide_youtube", "Esconder icono de YouTube")
			->text($themeslug."_googlemaps", "Google Maps URL", array('default' => 'http://maps.google.com'))
			->checkbox($themeslug."_hide_googlemaps", "Esconder icono de Google maps")
			->text($themeslug."_email", "Dirección de correo electrónico")
			->checkbox($themeslug."_hide_email", "Esconder icono de correo electrónico")
			->text($themeslug."_rsslink", "RSS URL")
			->checkbox($themeslug."_hide_rss_icon", "Esconder icono de RSS" , array('default' => true))
		->subsection_end()
		->subsection("Tracking y Scripts")
			->textarea($themeslug."_ga_code", "Código de Google Analytics")
			->textarea($themeslug."_custom_header_scripts", "Otros códigos de seguimiento (irán en la cabecera")
		->subsection_end()
	->section("Blog")
		->open_outersection()
			->section_order($themeslug."_blog_section_order", "Elementos Drag & Drop del blog", array('options' => array("response_index" => "Página de artículo", "response_blog_slider" => "Slider",  "response_callout_section" => "Zona de trackbacks"), "default" => 'response_blog_slider,response_index'))
		->close_outersection()
		->subsection("Opciones del blog")
			->images($themeslug."_blog_sidebar", "Opciones de sidebar", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_post_formats", "Iconos de formatos de archivo",  array('default' => true))
			->checkbox($themeslug."_show_excerpts", "Extractos de artículos")
			->text($themeslug."_excerpt_link_text", "Texto después del extracto (leer más...)", array('default' => '(More)&#8230;'))
			->text($themeslug."_excerpt_length", "Longitud (en caracteres) del extracto", array('default' => '55'))
			->checkbox($themeslug."_show_featured_images", "Imágenes destacadas")
			->select($themeslug."_featured_image_align", "Alineación de la imagen destacada", array( 'options' => array("key1" => "Izq", "key2" => "Centro", "key3" => "Derecha")))
			->text($themeslug."_featured_image_height", "Altura de la imagen destacada", array('default' => '100'))
			->text($themeslug."_featured_image_width", "Ancho de la imagen destacada", array('default' => '100'))
			->checkbox($themeslug."_featured_image_crop", "Recortar imágenes", array('default' => true))		
			->multicheck($themeslug."_hide_byline", "Elementos a mostrar en el artículo", array( 'options' => array($themeslug."_hide_author" => "Autor" , $themeslug."_hide_categories" => "Categorías", $themeslug."_hide_date" => "Fecha", $themeslug."_hide_comments" => "Comentarios",  $themeslug."_hide_tags" => "Etiquetas"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
		->subsection_end()
		->subsection("Carrusel")
			->upload($themeslug."_blog_slide_one_image", "Imagen 1", array('default' => array('url' => TEMPLATE_URL . '/images/responseslider.jpg')))
			->text($themeslug."_blog_slide_one_url", "Enlace 1", array('default' => 'http://cyberchimps.com'))
			->upload($themeslug."_blog_slide_two_image", "Imagen 2", array('default' => array('url' => TEMPLATE_URL . '/images/responseslider.jpg')))
			->text($themeslug."_blog_slide_two_url", "Enlace 2", array('default' => 'http://cyberchimps.com'))
			->upload($themeslug."_blog_slide_three_image", "Imagen 3", array('default' => array('url' => TEMPLATE_URL . '/images/responseslider.jpg')))
			->text($themeslug."_blog_slide_three_url", "Enlace 3", array('default' => 'http://cyberchimps.com'))
		->subsection_end()
		->subsection("Opciones de llamadas")
			->textarea($themeslug."_blog_callout_text", "Introduce tu texto de llamadas")
		->subsection_end()
		->section("Plantillas")
		->subsection("Artículo individual")
			->images($themeslug."_single_sidebar", "Opciones de barra lateral", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_single_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_single_show_featured_images", "Imágenes destacadas")
			->checkbox($themeslug."_single_post_formats", "Iconos de formatos de archivo",  array('default' => true))
			->multicheck($themeslug."_single_hide_byline", "Elementos a mostar en el artículo", array( 'options' => array($themeslug."_hide_author" => "Autor" , $themeslug."_hide_categories" => "Categorías", $themeslug."_hide_date" => "Fecha", $themeslug."_hide_comments" => "Comentarios",  $themeslug."_hide_tags" => "Etiquetas"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_post_pagination", "Enlaces de paginación",  array('default' => true))
		->subsection_end()	
		->subsection("Archivo")
			->images($themeslug."_archive_sidebar", "Opciones de barra lateral", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_archive_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_archive_show_excerpts", "Extractos", array('default' => true))
			->checkbox($themeslug."_archive_show_featured_images", "Imágenes destacadas")
			->checkbox($themeslug."_archive_post_formats", "Iconos de formatos de archivo",  array('default' => true))
			->multicheck($themeslug."_archive_hide_byline", "Elementos a mostrar en el artículo", array( 'options' => array($themeslug."_hide_author" => "Autor" , $themeslug."_hide_categories" => "Categorías", $themeslug."_hide_date" => "Fecha", $themeslug."_hide_comments" => "Comentarios",  $themeslug."_hide_tags" => "Etiquetas"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->subsection_end()
		->subsection("Búsqueda")
			->images($themeslug."_search_sidebar", "Opciones de barra lateral", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_search_show_excerpts", "Post Excerpts", array('default' => true))
		->subsection_end()
		->subsection("404 - no encontrado")
			->images($themeslug."_404_sidebar", "Opciones de barra lateral", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->textarea($themeslug."_custom_404", "Contenido personalizado para la página 404")
		->subsection_end()
	->section("Pie")
		->open_outersection()
			->text($themeslug."_footer_text", "Texto de Copyright")
		->close_outersection()	
;
}
