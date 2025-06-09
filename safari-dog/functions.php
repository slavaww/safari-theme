<?php
/**
 * Safari-dog functions
 * 
 * @todo подключить стили не из файла style.css
 */

/**
 * Структура подключаемых файлов темы

 * ./
 * ../
 *    ajax-callbacks/    - обработчики ajax событий
 *    inc/               - модули/утилиты/сниппеты
 *    post_types/        - кастомные типы постов, их настройки
 *    shortcodes/        - регистраиця шорткодов
 *
 * ./customize.php        - настройки темы оформления (цвета, банеры, всплывающее сообщение, ...)
 * ./editor-formats.php   - настройка формато визуального редактора
 * ./enqueue.php          - загрузка css/js файлов темы
 * ./theme-setup.php      - настройки темы (features)
 * ./utils.php            - вспомогательыне фунции
 * ./widgets.php          - регистрация виджетов и сайдбаров темы
 * ./wordpress.php        - оптимизация дефолтных настроек WP remove_(action/filter)
 *
 */

/**
 * Рекурсивный обход директорий (не поддерживает флаг GLOB_BRACE)
 * @see http://php.net/manual/en/function.glob.php#106595
 */
if ( ! function_exists('glob_recursive'))
{
    function glob_recursive($pattern, $flags = 0)
    {
        $files = glob($pattern, $flags);

        foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir)
        {
            $files = array_merge($files, glob_recursive($dir . '/' . basename($pattern), $flags));
        }

        return $files;
    }
}

/**
 * Автозагрузка *.php из /functions
 */
foreach (glob_recursive(get_template_directory() . "/functions/*.php") as $include_path) {
    @include $include_path;
}