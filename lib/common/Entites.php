<?php
/**
 * Created by PhpStorm.
 * User: Rados
 * Date: 4.1.14
 * Time: 1:42
 */

namespace Common;


class Entites
{

    protected $name;
    protected $surname;
    protected $tel;
    protected $email;
    protected $text;

    function __construct($name, $surname, $email, $text, $tel = NULL)
    {
        // Settery vyžadovány z důvodu validace prázdných hodnot, dle zadání;
        $this->setName($name);
        $this->setSurname($surname);
        $this->setEmail($email);
        $this->setText($text);
        $this->setTel($tel);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        if (!$name) {
            throw new \InvalidArgumentException;
        }

        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param $surname
     * @return $this
     */
    public function setSurname($surname)
    {

        if (!$surname) {
            throw new \InvalidArgumentException;
        }

        $this->surname = $surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        if (!$email) {
            throw new \InvalidArgumentException;
        }

        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     * @return $this
     */
    public function setText($text)
    {
        if (!$text) {
            throw new \InvalidArgumentException;
        }

        $this->text = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param $tel
     * @return $this
     */
    public function setTel($tel)
    {

        $tel = $tel ? $tel : NULL;

        $this->tel = $tel;
        return $this;
    }


}