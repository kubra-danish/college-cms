<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/MailConfig.php';

class MailService
{
    public function sendCredentialsEmail($toEmail, $name, $role, $loginId, $plainPassword)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = MAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_USERNAME;
            $mail->Password   = MAIL_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = MAIL_PORT;

            $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
            $mail->addAddress($toEmail, $name);

            $loginUrl = 'http://localhost/college/public/index.php?url=home';

            $mail->isHTML(true);
            $mail->Subject = 'Your College CMS Login Credentials';
            $mail->Body = "
                <h3>Welcome to College CMS</h3>
                <p>Dear {$name},</p>
                <p>Your account has been created by the administrator.</p>
                <p><strong>Role:</strong> {$role}</p>
                <p><strong>Login ID:</strong> {$loginId}</p>
                <p><strong>Password:</strong> {$plainPassword}</p>
                <p><strong>Login URL:</strong> {$loginUrl}</p>
            ";

            $mail->AltBody =
                "Role: {$role}\n" .
                "Login ID: {$loginId}\n" .
                "Password: {$plainPassword}\n" .
                "Login URL: {$loginUrl}";

            $mail->send();

            return [
                'success' => true,
                'error' => null
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $mail->ErrorInfo
            ];
        }
    }
}