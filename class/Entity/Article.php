<?php
declare(strict_types=1);

namespace App\Entity;

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
     * One Student has One Mentor.
     * @OneToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $author;

    /** 
     * @Column(name="`created_date`", type="date") 
     */
    private $created_date;

    /** 
     * @Column(name="`updated_date`", type="date") 
     */
    private $updated_date;
    
}