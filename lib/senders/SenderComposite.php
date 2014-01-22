<?php
/**
 * Created by PhpStorm.
 * User: Rados
 * Date: 3.1.14
 * Time: 22:10
 */

namespace Senders;

class SenderComposite implements ISender
{
    protected $senders = array();

    public function addSender(ISender $sender)
    {
        $this->senders[] = $sender;
    }

    public function send()
    {
        foreach ($this->senders as $sender) {
            $sender->send();
        }
    }
}