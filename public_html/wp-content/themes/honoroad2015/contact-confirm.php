<?php
/*
 * Author: KhangLe
 * Template Name: Contact Confirm
 *
 */

$site_key = '6LeGRBETAAAAAIQx1ILt6av7twENg2SSjgMu6S78';
$secret_key = '6LeGRBETAAAAACqcKxJKwWov6nZkavBF6gabL8Y4';

//var_dump($_POST['g-recaptcha-response']);
//var_export($_POST);
$recaptcha = new \ReCaptcha\ReCaptcha('6LfYQRETAAAAAD1qa_x5_kmato1hRwQbUJRVsHnX');
var_dump($recaptcha);
exit;

if (isset($_POST['submit'])) {

    $reg_title = @htmlspecialchars(stripslashes($_POST['re_title']));
    $reg_name = @htmlspecialchars(stripslashes($_POST['re_name']));
    $reg_email = @htmlspecialchars($_POST['re_email']);
    $reg_company = @htmlspecialchars(stripslashes($_POST['re_company']));
    $reg_tel = @htmlspecialchars($_POST['re_phone']);
    $reg_fax = @htmlspecialchars($_POST['re_fax']);
    $reg_content = @htmlspecialchars(stripslashes($_POST['re_content']));

    $data = array(
        'title' => $reg_title,
        'name' => $reg_name,
        'email' => $reg_email,
        'company' => $reg_company,
        'tel' => $reg_tel,
        'fax' => $reg_fax,
        'content' => $reg_content,
    );

    
    var_dump($data);
    
    exit;
    
    require_once 'includes/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();

    $loader = new Twig_Loader_String;

    $twig = new Twig_Environment($loader);

    $from = job_get_option('wpt_job_text_from_email');
    $fromname = job_get_option('wpt_job_text_from_name');
    // Mail to Candidate
    $body_candidate = job_get_option('wpt_job_text_block_candidate');
    if (isset($body_candidate) && $body_candidate != '') {
        $body_candidate = $twig->render($body_candidate, $data);
        $subject_candidate = $twig->render(job_get_option('wpt_job_text_subject_candidate'), $data);
        $headers = 'From: ' . $fromname . ' <' . $from . '>' . '\r\n';
        //	
        wp_mail($data['email'], stripslashes($subject_candidate), stripslashes($body_candidate), $headers);
    }

    //Admin用メッセージ
    $body_admin = job_get_option('wpt_job_text_block_admin');
    if (isset($body_admin) && $body_admin != '') {
        $body_admin = $twig->render($body_admin, array_merge(
                        $data, array(
            'entry_time' => gmdate("Y/m/d H:i:s", time() + 9 * 3600),
            'entry_host' => gethostbyaddr(getenv("REMOTE_ADDR")),
            'entry_ua' => getenv("HTTP_USER_AGENT"),
        )));
        //
        $subject_admin = job_get_option('wpt_job_text_subject_admin');
        //
        $list_email = job_get_option('wpt_job_text_list_email');
        if (isset($list_email) && $list_email != '') {
            $list_email = preg_split('/\r\n|\n|\r/', $list_email);
            //
            $headers = 'From: ' . $fromname . ' <' . $from . '>' . '\r\n';
            //
            wp_mail($list_email, stripslashes($subject_admin), stripslashes($body_admin), $headers);
        }
    }

    wp_redirect(home_url() . '/contact/thankyou');
    exit();
} else {
    wp_redirect(home_url() . '/contact');
    exit();
}