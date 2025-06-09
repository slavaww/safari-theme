<?php
/**
 * Get reg modal footer part
 */
?>
<div class="modal fade" id="getTouchModal" tabindex="-1" aria-labelledby="getTouchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="ModalLabel">Оставайтесь с нами на связи</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="my-3">
                        <label for="user_login" class="form-label"><?php _e('Username');?>:</label>
                        <input type="text" name="user_login" value="" id="user_login" class="form-control" placeholder="<?php _e('Username');?>" />
                        <div class="form-text">Можно использовать никнейм</div>
                    </div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email:</label>
                        <input type="text" name="user_email" value="" id="user_email" class="form-control" placeholder="name@example.com" />
                        <div id="emailHelp" class="form-text">Мы никогда не будем передавать ваш E-mail кому-либо.</div>
                        <?php do_action('register_form'); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><?php _e('Close'); ?></button>
                    <input type="submit" class="btn btn-warning" value="Регистрация" id="register" />
                </div>
            </div>
        </form>
    </div>
  </div>
</div>

<script>
    const getTouchModal = document.getElementById('getTouchModal')
    getTouchModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        
        // Update the modal's content.
        if (recipient == 'gettouch') {
            const inpValue = document.querySelector('#floatingInputValue').value

            getTouchModal.querySelector("#user_email").value = inpValue;
        }
    })
</script>