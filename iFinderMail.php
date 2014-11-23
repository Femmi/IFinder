<?php
/**
 * Created by PhpStorm.
 * User: Abhinav
 * Date: 11/22/14
 * Time: 7:22 PM
 */

require_once 'utils/mail/PHPMailerAutoload.php';

class iFinderMail
{

    public static function sendMail($recipient, $description)
    {
 /*       $smtp = array();
        // **** You must change the following to match your
        // **** SMTP server and account information.
        $smtp['host'] = 'ssl://smtp.gmail.com';
        $smtp['port'] = 465;
        $smtp['auth'] = true;
        $smtp['username'] = 'ifinderr@gmail.com';
        $smtp['password'] = 'rootroot';

        $mailer = Mail::factory('smtp', $smtp);


        // Add the email address to the list of all recipients
        $recipients = array();
        $recipients[] = $recipient; // this is owner email id

        // Set the headers
        $headers = array();
        $headers['From'] = "ifinderr@gmail.com";
        $headers['To'] = $recipients;
        $headers['Subject'] = "IFINDER (LOST AND FOUND)";
        $headers['Content-type'] = 'text/html';
        //set the content for body
        $body = "This is to let you know that <b>" . $description . " </b> has been dispatched to its owner.<br> Thank you for having reported the lost item. <br> Have a great day.";

        // Send the email
        return $result = $mailer->send($recipients, $headers, $body);*/


        $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();
        $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ifinderr@gmail.com';                 // SMTP username
        $mail->Password = 'rootroot';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;
        //$mail->From = 'ifinderr@gmail.com';
        $mail->addAddress($recipient, 'Joe User');
        $mail->FromName = 'iFinder';
        $mail->isHTML(true);
        $mail->Subject = 'iFinder ' . $description . ' delivered';
        $mail->Body = "This is to let you know that <b>" . $description . " </b> has been dispatched to its owner.<br> Thank you for having reported the lost item. <br> Have a great day.";

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }


}