<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailerController extends Controller
{
    public function composeEmail($email)
    {
        $mail = new PHPMailer(true);
        $verification_code = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTU"), 0, 6);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env("MAIL_HOST");
            $mail->SMTPAuth = true;
            $mail->Username = env("MAIL_USERNAME");
            $mail->Password = env("MAIL_PASSWORD");
            $mail->SMTPSecure = env("MAIL_ENCRYPTION");
            $mail->Port = env("MAIL_PORT");

            $mail->setFrom(env("MAIL_FROM_ADDRESS"), 'Jingga Kreatif');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Kode Verifikasi Email";
            $mail->Body    = "Kode Verifikasi Email Anda Adalah: <strong>" . $verification_code . "</strong>";

            if (!$mail->send())
                return response()->json(['message' => 'Email not sent.', 'isSuccess' => false]);
            else
                return response()->json(['message' => 'Email has been sent.', 'isSuccess' => true, 'verificationCode' => $verification_code]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Message could not be sent.']);
        }
    }
}
