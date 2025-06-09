<?php

use PHPMailer\PHPMailer\PHPMailer;
 
/**
 * Настройка SMTP
 *
 * @param PHPMailer $phpmailer объект PHPMailer
 */
function safari_send_smtp_email( PHPMailer $phpmailer ) {
  $phpmailer->isSMTP();
  $phpmailer->Host       = SMTP_HOST;
  $phpmailer->SMTPAuth   = SMTP_AUTH;
  $phpmailer->Port       = SMTP_PORT;
  $phpmailer->Username   = SMTP_USER;
  $phpmailer->Password   = SMTP_PASS;
  $phpmailer->SMTPSecure = SMTP_SECURE;
  $phpmailer->Sender     = SMTP_FROM;
  $phpmailer->From       = SMTP_FROM;
  $phpmailer->FromName   = SMTP_NAME;
}
add_action( 'phpmailer_init', 'safari_send_smtp_email' );