<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="article")
 */
class Article 
{   
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /** 
     * @Column(name="`title`", type="string") 
     */
    private $title;

    /** 
     * @Column(name="`body`", type="text") 
     */
    private $body;
    
    /** 
     * @Column(name="`created_date`", type="date") 
     */
    private $created_date;

    /** 
     * @Column(name="`updated_date`", type="date") 
     */
    private $updated_date;

    /**
     * @OneToMany(targetEntity="Comment", mappedBy="article")
     */
    private $comments;

    public function __construct() {
        $this->comments = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId(): int 
    {
        return $this->id;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string 
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void 
    {
        $this->title = $title;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody(): string 
    {
        return $this->body;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return void
     */
    public function setBody(string $body): void 
    {
        $this->body = $body;
    }

    /**
     * Set created date
     *
     * @param object $created_date
     * @return void
     */
    public function setCreatedDate(object $created_date): void 
    {
        $this->created_date = $created_date;
    }

    /**
     * Get created date
     *
     * @return object
     */
    public function getCreatedDate(): object 
    {
        return $this->created_date;
    }

    /**
     * Set updated date
     *
     * @param object $updated_date
     * @return void
     */
    public function setUpdatedDate(object $updated_date): void 
    {
        $this->updated_date = $updated_date;
    }

    /**
     * Get updated date
     *
     * @return object
     */
    public function getUpdatedDate(): object 
    {
        return $this->updated_date;
    }

    /**
     * Get article comments
     *
     * @return object
     */
    public function getComments(): object 
    {
        return $this->comments;
    }

    /**
     * Set comment
     *
     * @param Comment $comment
     */
    public function setComment(Comment $comment): void
    {
        $this->comments[] = $comment;
        $comment->setArticle($this);
    }
    
}