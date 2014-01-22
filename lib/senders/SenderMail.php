<?php
/**
 * Created by PhpStorm.
 * User: Rados
 * Date: 3.1.14
 * Time: 22:21
 */

namespace Senders;


class SenderMail implements ISender
{
    protected $emailTo = NULL;

    public function __construct($emailTo)
    {
        $this->setEmailTo($emailTo);
    }

    public function send()
    {
        $subject = 'The Subject';
        $message = 'Hello AdFinance';
        $headers = 'From: radoshordos@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        return mail($this->emailTo, $subject, $message, $headers);
    }

    public function getEmailTo()
    {
        return $this->emailTo;
    }

    public function setEmailTo($emailTo)
    {
        if (!filter_var($emailTo, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Bad email format.");
        }
        $this->emailTo = $emailTo;
    }
} 