<?php
/**
 * Created by PhpStorm.
 * User: Rados
 * Date: 4.1.14
 * Time: 0:06
 */

namespace Common;

class Connection extends \PDO
{
    private $database = "mysql:host=localhost;dbname=adfinance";
    private $user = 'root';
    private $password = 'atad';

    public function __construct()
    {
        try {
            return parent::__construct($this->database, $this->user, $this->password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

}