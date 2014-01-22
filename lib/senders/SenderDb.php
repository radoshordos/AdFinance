<?php
/**
 * Created by PhpStorm.
 * User: Rados
 * Date: 3.1.14
 * Time: 22:11
 */

namespace Senders;

use Common\Connection;
use Common\Entites;

class SenderDb implements ISender
{

    protected $connection;
    protected $entity;

    public function __construct(Connection $connection, Entites $entity)
    {
        $this->connection = $connection;
        $this->entity = $entity;
    }

    public function send()
    {
        // TODO: Better security required.

        $sth = $this->connection->prepare(' INSERT INTO contact (name,surname,email,text,tel) ' .
                                            'VALUES (:name,:surname,:email,:text,:tel)');
        $sth->execute(array(
            ':name' => $this->entity->getName(),
            ':surname' => $this->entity->getSurname(),
            ':email' => $this->entity->getEmail(),
            ':text' => $this->entity->getText(),
            ':tel' => $this->entity->getTel(),
        ));

    }
}