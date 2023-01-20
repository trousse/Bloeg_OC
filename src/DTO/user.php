<?php

namespace APP\Blog\DTO;


class user {

    protected $id;
    protected $sub_date;
    protected $last_connection_date;
    protected $pseudo;
    protected $email;
    protected $pass;
    protected $status;

    public function __construct(){}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSubDate()
    {
        return $this->sub_date;
    }

    /**
     * @param mixed $sub_date
     */
    public function setSubDate($sub_date): void
    {
        $this->sub_date = $sub_date;
    }

    /**
     * @return mixed
     */
    public function getLastConnectionDate()
    {
        return $this->last_connection_date;
    }

    /**
     * @param mixed $last_connection_date
     */
    public function setLastConnectionDate($last_connection_date): void
    {
        $this->last_connection_date = $last_connection_date;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass): void
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }


}