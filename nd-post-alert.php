<?php

/**
 * Plugin Name:       Não Divulgue Post Alert
 * Plugin URI:        https://naodivulgue.com.br/
 * Description:       Ferramentas Uteis da Não Divulgue para seu WordPress
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            Vinicius Borges Ribeiro
 * Author URI:        https://naodivulgue.com.br/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       nd-post-alert
 * Domain Path:       /nd-post-alert
 */

class ND_Post_Alert
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {

        add_action('phpmailer_init', 'send_smtp_email');
        add_action('draft_post', 'avisar_time_nd', 1, 1);
    }
}

function avisar_time_nd($postid)
{
    $post_content = get_post($postid);
    $content = $post_content->post_content;
    wp_mail(APROVADOR, "Rascunho Criado - " . get_the_title($postid), "Ele está esperando por nossos ajustes e aprovação! Vamos pra cima!");
}

function send_smtp_email($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = SMTP_HOST;
    $phpmailer->SMTPAuth = SMTP_AUTH;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->Username = SMTP_USERNAME;
    $phpmailer->Password = SMTP_PASSWORD;
    $phpmailer->From = SMTP_FROM;
    $phpmailer->FromName = SMTP_FROMNAME;
    $phpmailer->SMTPAutoTLS = false;
}

ND_Post_Alert::getInstance();
