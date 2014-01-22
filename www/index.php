<?php
/**
 * Created by PhpStorm.
 * User: Rados
 * Date: 3.1.14
 * Time: 22:01
 */

header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Europe/Prague');
error_reporting(E_ALL);
ini_set("display_errors", 1);

use Common\Connection;
use Common\Entites;
use Senders\SenderComposite;
use Senders\SenderDb;
use Senders\SenderMail;

require '..\lib\common\Connection.php';
require '..\lib\common\Entites.php';
require '..\lib\senders\ISender.php';
require '..\lib\senders\SenderComposite.php';
require '..\lib\senders\SenderDb.php';
require '..\lib\senders\SenderMail.php';


if (isset($_POST['_send'])) {

    $connection = new Connection();
    $form = new Entites($_POST["name"], $_POST["surname"], $_POST["email"], $_POST["text"], $_POST["tel"]);



    $composite = new SenderComposite();
    $composite->addSender(new SenderDb($connection, $form));
    $composite->addSender(new SenderMail($form->getEmail()));
    $composite->send();
}

?>
<form action="" method="post">
    <p>
        <label for="name">Jméno:</label>
        <input type="text" name="name" id="name" />

        <!-- No HTML5 validation
        <input type="text" name="name" id="name" required="required"/>
        -->
    </p>

    <p>
        <label for="surname">Příjmení:</label>
        <input type="text" name="surname" id="surname"/>
        <!--
        <input type="text" name="surname" id="surname" required="required"/>
        -->
    </p>

    <p>
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email"/>
        <!--
        <input type="email" name="email" id="email" required="required"/>
        -->
    </p>

    <p>
        <label for="text">Text:</label>
        <input type="text" name="text" id="text"/>
        <!--
        <input type="text" name="text" id="text" required="required"/>
        -->
    </p>

    <p>
        <label for="tel">Tel:</label>
        <input type="text" name="tel" id="tel"/>
    </p>

    <p><input type="submit" name="_send"></p>
</form>
