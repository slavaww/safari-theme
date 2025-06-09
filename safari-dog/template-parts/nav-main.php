<?php
/**
 * The main navigation
 */

$menu_html = get_transient('main_menu');

if (false === $menu_html) {
    ob_start(); ?>
    <nav class="navbar navbar-expand-lg">
        <?php if (has_custom_logo()): 
            the_custom_logo(); 
        else: ?>
        <a href="/" class="navbar-brand">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/SafariLogo1.png" width="50" height="47" alt="">
        </a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
            $m_buttons = '<div class="d-grid gap-2 d-md-flex justify-content-md-end">';
            if (is_user_logged_in()) {
                $btn_txt = 'Профиль';
            } else {
                $m_buttons .= '<button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#regModal" data-bs-whatever="enter">Войти</button>';
                $btn_txt = 'Регистрация';
            }
            $m_buttons .= '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#regModal" data-bs-whatever="register">' . $btn_txt . '</button>';
            $m_buttons .= '</div>';
            wp_nav_menu(
                array(
                'theme_location'   => '',
                'menu'             => 'main',
                'menu_id'          => 'primary-menu',
                'menu_class'       => 'navbar-nav mb-2 mb-lg-0',
                'container_class'  => 'collapse navbar-collapse',
                'container_id'     => 'navbarNav',
                'list_item_class'  => 'nav-item',
                'link_class'       => 'nav-link',
                'items_wrap'       => '<ul id="%1$s" class="%2$s">%3$s</ul>' . $m_buttons
                )
            );
        ?>
    </nav>
    <?php
    $menu_html = ob_get_contents();
    ob_end_clean();
    set_transient('main_menu', $menu_html, WEEK_IN_SECONDS * 4);
}
echo $menu_html;