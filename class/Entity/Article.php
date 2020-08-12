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
     * @Column(name="`created_date`", type="date") 
     */
    private $created_date;

    /** 
     * @Column(name="`updated_date`", type="date") 
     */
    private $updated_date;

    public function getTitle(): string 
    {
        return $this->title;
    }
    
}