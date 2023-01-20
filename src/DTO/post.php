<?php

namespace APP\Blog\DTO;

class post{

    protected $id;
    protected $userId;
    protected $content;
    protected $create_date;
    protected $last_edit_date;
    protected $title;
    protected $header;
    protected $nbLike;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }


    public function __construct(){}

    /**
     * @return mixed
     */
    public function getNbLike()
    {
        return $this->nbLike;
    }

    /**
     * @param mixed $nbLike
     */
    public function setNbLike($nbLike): void
    {
        $this->nbLike = $nbLike;
    }

    /**
     * @param mixed $nbLike
     */
    public function addLike(): void
    {
        $this->nbLike++;
    }

    /**
     * @return mixed
     */
    public function getNbComment()
    {
        return $this->nbComment;
    }

    /**
     * @param mixed $nbComment
     */
    public function setNbComment($nbComment): void
    {
        $this->nbComment = $nbComment;
    }
    protected $nbComment;

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param mixed $header
     */
    public function setHeader($header): void
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }
    protected $image;

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
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * @param mixed $create_date
     */
    public function setCreateDate($create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return mixed
     */
    public function getLastEditDate()
    {
        return $this->last_edit_date;
    }

    /**
     * @param mixed $last_edit_date
     */
    public function setLastEditDate($last_edit_date): void
    {
        $this->last_edit_date = $last_edit_date;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return ucfirst($this->title);
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getArrayPost(){
        return (array)$this;
    }


}