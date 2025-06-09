<?php
/**
 * This function for print breadcrumbs
 * 
 */
function wr_breadcrumbs()
{
	echo '<nav aria-label="breadcrumb">' . PHP_EOL;
    echo '<ol class="breadcrumb">' . PHP_EOL;
	
	// получаем номер текущей страницы
	$page_num = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$separator = ''; //  разделяем обычным слэшем, но можете чем угодно другим

	// если главная страница сайта
	if (is_front_page()) {

		if ($page_num > 1) {
			echo '<a href="' . site_url() . '">Главная</a>' . $separator . $page_num . '-я страница';
		} else {
			echo 'Вы находитесь на главной странице';
		}

	} else { // не главная
		
		echo '<li class="breadcrumb-item">
				<a href="' . site_url() . '">Главная</a></li>';

		if (is_single()) { // записи
			echo "<li class=\"breadcrumb-item\">";
			the_category(', ');
			echo '</li>';
			echo "<li class=\"breadcrumb-item active\" aria-current=\"page\">";
			the_title();

		} elseif (is_page()) { // страницы WordPress
			global $post;
			// если у текущей страницы существует родительская
			if ($post->post_parent) {

				$parent_id = $post->post_parent; // присвоим в переменную
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_post($parent_id);
					$breadcrumbs[] = '<li class="breadcrumb-item">
										<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>' .
									  '</li>';
					$parent_id = $page->post_parent;
				}

				echo join($separator, array_reverse($breadcrumbs)) . $separator;

			}
            echo "<li class=\"breadcrumb-item active\" aria-current=\"page\">";
			the_title();
            echo "</li>";

		} elseif (is_category()) {
			echo "<li class=\"breadcrumb-item active\" aria-current=\"page\">";
			single_cat_title();
			echo '</li>';
		} elseif (is_tag()) {
			echo "<li class=\"breadcrumb-item active\" aria-current=\"page\">";
			single_tag_title();
			echo '</li>';
		} elseif (is_day()) { // архивы (по дням)
			echo "<li class=\"breadcrumb-item\">";
			echo "<a href=\"" . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
			echo '</li>';
			echo "<li class=\"breadcrumb-item\">";
			echo "<a href=\"" . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $separator;
			echo "<meta itemprop=\"position\" content=\"3\" />";
			echo '</li>';
			echo "<li class=\"breadcrumb-item active\" aria-current=\"page\">";
			echo get_the_time('d');
			echo '</li>';

		} elseif (is_month()) { // архивы (по месяцам)
			echo "<li class=\"breadcrumb-item\">";
			echo "<a href=\"" . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
			echo '</li>';
			echo "<li class=\"breadcrumb-item active\" aria-current=\"page\">";
			echo get_the_time('F');
			echo '</li>';
		} elseif (is_year()) { // архивы (по годам)
			echo "<li class=\"breadcrumb-item active\" aria-current=\"page\">";
			echo get_the_time('Y');
			echo '</li>';
		} elseif (is_author()) { // архивы по авторам

			global $author;
			$userdata = get_userdata($author);
			echo 'Опубликовал(а) ' . $userdata->display_name;

		} elseif (is_404()) { // если страницы не существует

			echo 'Ошибка 404';

		}

		if ($page_num > 1) { // номер текущей страницы
			echo ' (' . $page_num . '-я страница)';
		}
		echo '</ol></nav>';
	}

}