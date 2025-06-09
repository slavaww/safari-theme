<?php
/**
 * Форма регистрации на сайте
 * через модальное окно
 */
?>

<div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> <!-- основной контейнер -->

                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="ModalLabel"><?php echo get_bloginfo( 'name', 'display' ); ?></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php if ( !is_user_logged_in() ) : ?>
                    <?php $mod_footer = false; ?>
                    <ul class="nav nav-tabs" id="regFormTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="enter-tab" data-bs-toggle="tab" data-bs-target="#enter-tab-pane" type="button" role="tab" aria-controls="enter-tab-pane" aria-selected="false">Вход</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="registration-tab" data-bs-toggle="tab" data-bs-target="#registration-tab-pane" type="button" role="tab" aria-controls="registration-tab-pane" aria-selected="true">Регистрация</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="regFormTabContent">
                        <div class="tab-pane fade" id="enter-tab-pane" role="tabpanel" aria-labelledby="enter-tab" tabindex="0">
                            <form action="<?php echo wp_login_url(get_permalink()); ?>" id="loginForm" method="post">
                                <div class="my-3">
                                    <label for="login" class="form-label"><?php _e('Username');?>:</label>
                                    <input type="text" name="log" value="<?php echo esc_html(stripslashes($user_login), 1) ?>"  id="login" class="form-control" placeholder="<?php _e('Username');?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="pass" class="form-label">Пароль:</label>
                                    <input type="password" name="pwd" value="" id="pass" class="form-control" placeholder="<?php _e('Password'); ?>" />
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><?php _e('Close'); ?></button>
                                    <button class="btn btn-outline-warning" name="submit" type="submit">Войти</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show active" id="registration-tab-pane" role="tabpanel" aria-labelledby="registration-tab" tabindex="0">
                            <!-- registrtion -->
                            <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
                                <div class="my-3">
                                    <label for="user_login" class="form-label"><?php _e('Username');?>:</label>
                                    <input type="text" name="user_login" value="" id="user_login" class="form-control" placeholder="<?php _e('Username');?>" />
                                    <div class="form-text">Можно использовать никнейм</div>
                                </div>
                                <div class="mb-3">
                                    <label for="user_email" class="form-label">Email:</label>
                                    <input type="text" name="user_email" value="" id="user_email" class="form-control" placeholder="name@example.com" />
                                    <div id="emailHelp" class="form-text">Мы никогда не будем его передавать кому-либо.</div>
                                    <?php do_action('register_form'); ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><?php _e('Password'); ?>:</label>
                                    <input class="form-control" type="text" value="Пароль вышлем вам почтой" aria-label="readonly input" readonly>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><?php _e('Close'); ?></button>
                                    <input type="submit" class="btn btn-warning" value="Регистрация" id="register" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php else : ?>

                        <?php $mod_footer = true;

                        // получили объект с данными текущего авторизованного пользователя
                        $current_user = wp_get_current_user();
                        ?>
                        <div class="row">
                            <div class="col-4">
                                <?php echo get_avatar( $current_user->user_email, '96' ); ?>
                            </div>
                            <div class="col-8">
                                <h4>Ваш профиль</h4>
                                <dl class="row">
                                    <dt class="col-5">Ваше имя:</dt><dd class="col-7"><?php echo $current_user->display_name; ?></dd>
                                    <dt class="col-5">Ваш E-mail:</dt><dd class="col-7"><?php echo $current_user->user_email; ?></dd>
                                </dl>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($mod_footer) { ?>
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="<?php bloginfo('url') ?>/wp-admin/profile.php" class="btn btn-outline-warning" title="изменить">Изменить</a>
                        <a href="<?php echo wp_logout_url(); ?>" class="btn btn-outline-warning" title="<?php _e('Выход'); ?>"><?php _e('Выход'); ?></a>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><?php _e('Close'); ?></button>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->
<?php if ( ! $mod_footer ) { ?>
<script>
    const regModal = document.getElementById('regModal')
    regModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')

        // Update the modal's content.
        const modalBtn = regModal.querySelector('#enter-tab')
        const modalBtn2 = regModal.querySelector('#registration-tab')
        const tabEnter = regModal.querySelector('#enter-tab-pane')
        const tabRegister = regModal.querySelector('#registration-tab-pane')

        if (recipient == 'enter') {
            modalBtn.setAttribute('aria-selected', "true")
            modalBtn.classList.add('active')
            modalBtn2.setAttribute('aria-selected', "false")
            modalBtn2.classList.remove('active')

            tabRegister.classList.remove('show', 'active')
            tabEnter.classList.add('show', 'active')
        } else if (recipient == 'register') {
            modalBtn.setAttribute('aria-selected', "false")
            modalBtn.classList.remove('active')
            modalBtn2.setAttribute('aria-selected', "true")
            modalBtn2.classList.add('active')

            tabEnter.classList.remove('show', 'active')
            tabRegister.classList.add('show', 'active')
        }
    })
</script>
<?php } ?>
