<?php
/**
 * This function for delay Yandex.metrica script,
 * Подключить номер счетчика в кастомайзере!!!
 */
add_action('wp_head', function() {
    ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        ( function () {
            'use strict';
            <?php
            // Флаг, что Метрика уже загрузилась. ?>
            var loadedMetrica = false;
                const metricaId = <?php echo get_theme_mod('ya_metrika', '') ?>;
                <?php
                // Переменная для хранения таймера. ?>
                var timerId;
            <?php
            // Для бота Яндекса грузим Метрику сразу. ?>
            if ( navigator.userAgent.indexOf( 'YandexMetrika' ) > -1 ) {
                loadMetrica();
            } else {
                <?php
                // Подключаем Метрику, если юзер начал скроллить. ?>
                window.addEventListener( 'scroll', loadMetrica, {passive: true} );
                <?php
                // Подключаем Метрику, если юзер коснулся экрана. ?>
                window.addEventListener( 'touchstart', loadMetrica );
                <?php
                // Подключаем Метрику, если юзер дернул мышкой. ?>
                document.addEventListener( 'mouseenter', loadMetrica );
                <?php
                // Подключаем Метрику, если юзер кликнул мышкой. ?>
                document.addEventListener( 'click', loadMetrica );
                <?php
                // Подключаем Метрику при полной загрузке DOM дерева,
                // с "отложкой" в 1 секунду через setTimeout,
                // если пользователь ничего вообще не делал (фоллбэк). ?>
                document.addEventListener( 'DOMContentLoaded', loadFallback );
            }

            function loadFallback() {
                timerId = setTimeout( loadMetrica, 1000 );
            }

            function loadMetrica( e ) {

                if ( loadedMetrica ) {
                    return;
                }

                (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                   m[i].l=1*new Date();
                   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
                   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
                   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
                ym( metricaId, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true });
                <?php
                // Отмечаем флаг, что Метрика загрузилась,
                // чтобы не загружать её повторно при других
                // событиях пользователя и старте фоллбэка. ?>
                loadedMetrica = true;
                <?php
                // Очищаем таймер, чтобы избежать лишних утечек памяти. ?>
                clearTimeout( timerId );
                <?php
                // Отключаем всех наших слушателей от всех событий,
                // чтобы избежать утечек памяти. ?>
                window.removeEventListener( 'scroll', loadMetrica );
                window.removeEventListener( 'touchstart', loadMetrica );
                document.removeEventListener( 'mouseenter', loadMetrica );
                document.removeEventListener( 'click', loadMetrica );
                document.removeEventListener( 'DOMContentLoaded', loadFallback );
            }
        } )()
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/<?php echo get_theme_mod('ya_metrika', '') ?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <?php
}
);