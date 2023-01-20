<?php

namespace APP\Blog\DTO;

class comment{
    protected $id;
    protected $pseudo;
    protected $postTitle;
    protected $valided;
    protected $content;
    protected $date;
    protected $avatar;

    public function __construct(){}


    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }


    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */

    public function setDate($date): void
    {
        $this->date = $date;
    }

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
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * @param mixed $postTitle
     */
    public function setPostTitle($postTitle): void
    {
        $this->postTitle = $postTitle;
    }

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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getValided()
    {
        return $this->valided;
    }

    /**
     * @param mixed $valided
     */
    public function setValided($valided): void
    {
        $this->valided = $valided;
    }



}