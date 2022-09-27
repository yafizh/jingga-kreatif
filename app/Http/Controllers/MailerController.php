<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use Ramsey\Uuid\Uuid;

class MailerController extends Controller
{
    public function composeEmail(Request $request)
    {
        $mail = new PHPMailer(true);
        $uuid = Uuid::uuid4();
        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'abangfiq85@gmail.com';   //  sender username
            $mail->Password = 'vtobmaogvyzfiqnc';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465

            $mail->setFrom('abangfiq85@gmail.com', 'Jingga Kreatif');
            $mail->addAddress($request->email);

            $mail->isHTML(true);                // Set email content format to HTML

            // $mail->Subject = $request->emailSubject;
            // $mail->Body    = $request->emailBody;
            $mail->Subject = "Kode Aktivasi Email";
            $mail->Body    = "Kode Aktivasi Email Anda Adalah: <strong>" . $uuid . "</strong>";

            if (!$mail->send())
                return response()->json(['message' => 'Email not sent.']);
            else
                return response()->json(['message' => 'Email has been sent.', 'Uuid' => $uuid]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Message could not be sent.']);
        }
    }
}
