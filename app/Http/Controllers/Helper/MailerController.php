<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ResetPassword;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use PHPMailer\PHPMailer\PHPMailer;

class MailerController extends Controller
{

    function __construct()
    {
        $this->mail = new PHPMailer(true);
        try {
            $this->mail->SMTPDebug = 0;
            $this->mail->isSMTP();
            $this->mail->Host = env("MAIL_HOST");
            $this->mail->SMTPAuth = true;
            $this->mail->Username = env("MAIL_USERNAME");
            $this->mail->Password = env("MAIL_PASSWORD");
            $this->mail->SMTPSecure = env("MAIL_ENCRYPTION");
            $this->mail->Port = env("MAIL_PORT");
            $this->mail->isHTML(true);

            $this->mail->setFrom(env("MAIL_FROM_ADDRESS"), 'Jingga Kreatif');
        } catch (Exception $e) {
            return response()->json(['message' => 'Message could not be sent.']);
        }
    }

    public function composeEmail($email)
    {

        $verification_code = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTU"), 0, 6);
        try {
            $this->mail->addAddress($email);
            $this->mail->Subject = "Kode Verifikasi Email";
            $this->mail->Body    = "Kode Verifikasi Email Anda Adalah: <strong>" . $verification_code . "</strong>";

            if (!$this->mail->send())
                return response()->json(['message' => 'Email not sent.', 'isSuccess' => false]);
            else
                return response()->json(['message' => 'Email has been sent.', 'isSuccess' => true, 'verificationCode' => $verification_code]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Message could not be sent.']);
        }
    }

    public function sendResetPasswordLink($email)
    {
        $client = Client::where('is_deleted', false)->where('email', $email)->get();
        if ($client->count()) {
            $url = Crypt::encryptString($email);
            ResetPassword::create([
                'client_id' => $client->first()->id,
                'url' => $url
            ]);
            $link = env('APP_URL', 'localhost') . '/reset-password/' . $url;
            try {
                $this->mail->addAddress($email);
                $this->mail->Subject = "Reset Password";
                $this->mail->Body    = "
                Link Reset Password Anda Adalah: <a href='$link' target='_blank'><strong>$link</strong></a>
                <br>
                <br>
                <strong>Link ini berkalu selama 5 menit.</strong>
                ";

                if (!$this->mail->send())
                    return response()->json(['message' => 'Email not sent.', 'isSuccess' => false]);
                else
                    return response()->json(['message' => 'Email has been sent.', 'isSuccess' => true]);
            } catch (Exception $e) {
                return response()->json(['message' => 'Message could not be sent.']);
            }
        }
    }
}
