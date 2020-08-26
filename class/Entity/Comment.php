<?php
declare(strict_types=1);

namespace App\Entity;

/**
 * @Entity
 * @Table(name="comment")
 */
class Comment 
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
     * @ManyToOne(targetEntity="Article", inversedBy="comments")
     * @JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $article;

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
     * @param string $created_date
     * @return void
     */
    public function setCreatedDate(object $created_date): void 
    {
        $this->created_date = $created_date;
    }

    /**
     * Get created date
     *
     * @return string
     */
    public function getCreatedDate(): object 
    {
        return $this->created_date;
    }

    /**
     * Set updated date
     *
     * @param string $updated_date
     * @return void
     */
    public function setUpdatedDate(object $updated_date): void 
    {
        $this->updated_date = $updated_date;
    }

    /**
     * Get updated date
     *
     * @return string
     */
    public function getUpdatedDate(): object 
    {
        return $this->updated_date;
    }
}