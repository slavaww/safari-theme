<?php
/**
 * Список подстраниц какой-то родительской страницы
 * 
 * [page_list parent="35"]
 */

 // @TODO проверить на принадлежность к текущей странице
 function plist_shortcode( $atts ){
    $atts = shortcode_atts( [
		    'parent' => ''
	], $atts );

    if ( ! $atts['parent'] ) {
        return '';
    }
    $args = array(
        'authors'      => '', // все авторы
        'child_of'     => $atts['parent'], // дочерние страницы
        'date_format'  => get_option('date_format'),
        'depth'        => 0, // любой уровень вложенности
        'echo'         => 0, // вывести результат
        'exclude'      => '', // ничего не исключать
        'include'      => '', // не выводить какие-либо конкретные страницы
        'link_after'   => '', // ничего не добавлять перед ссылкой
        'link_before'  => '', // ничего не добавлять после ссылки
        'post_type'    => 'page', // тип поста - только страницы
        'post_status'  => 'publish', // статус - только опубликованные
        'show_date'    => '', // не указывать дату
        'sort_column'  => 'menu_order, post_title', // сорировать по порядку, а затем по заголовку
        'sort_order'   => '', // порядок сортировки - по возрастанию
        'title_li'     =>  '', //__('Navigation'), // заголовок списка - Страницы
    );

    $li_css = 'nav-item';
    $target_css = 'page_item';
    $a_css = '<a class="nav-link"';
    $output = '<nav><ul class="navbar-nav flex-column">';
    $output .= str_replace($target_css, $li_css, str_replace('<a', $a_css, wp_list_pages( $args )));
    $output .= '</ul></nav>';

    return $output;
}
add_shortcode( 'page_list', 'plist_shortcode' );