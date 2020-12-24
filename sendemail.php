<?php
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to, $subject, $content){

            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("bukabiina2007@gmail.com", "CityOfRefuge Choir");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new \SendGrid($key);

            try {
                $response = $sendgrid->send($email);
                return $response;

            } catch (Exception $e) {
                echo 'Email exception Caught : '.$e->getMessage() . "\n";
                return false;
            }

        }
    }

?>