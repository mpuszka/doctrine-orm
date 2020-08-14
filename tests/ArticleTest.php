<?php 
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Entity\Article;

final class ArticleTest extends TestCase
{   
    private $article; 

    public function setUp(): void 
    {
        $this->article = new Article;
    }

    public function testArticleProperties(): void 
    {   
        $this->expectException(Error::class);
        $this->article->title           = "new title";
        $this->article->body            = "new body";
        $this->article->created_date    = "new body";
        $this->article->created_date    = new \DateTime;
    }

    public function testTitle(): void 
    {   
        $this->expectException(TypeError::class);
        $this->article->getTitle();

        $title = 'New Title';
        $this->article->setTitle($title);
        $this->assertSame($title, $this->article->getTitle());
    }

    public function testBody(): void 
    {   
        $this->expectException(TypeError::class);
        $this->article->getBody();
    }

    public function setBody(): void 
    {
        $body = 'New body';
        $this->article->setTitle($title);
        $this->assertSame($title, $this->article->getBody());
    }

    public function testCreatedDate(): void 
    {   
        $this->expectException(TypeError::class);
        $this->article->getCreatedDate();
    }

    public function testIncorrectValueCreatedDate(): void
    {
        $this->expectException(TypeError::class);
        $this->article->setCreatedDate('2020-08-14');
    }

    public function testSetCreatedDate(): void 
    {
        $dateTimeObj = new \DateTime;
        $this->article->setCreatedDate($dateTimeObj);

        $this->assertSame($dateTimeObj, $this->article->getCreatedDate());
    }

    public function testUpdatedDate(): void 
    {   
        $this->expectException(TypeError::class);
        $this->article->getUpdatedDate();
    }

    public function testIncorrectValueUpdatedDate(): void
    {
        $this->expectException(TypeError::class);
        $this->article->setUpdatedDate('2020-08-14');
    }

    public function testSetUpdatedDate(): void 
    {
        $dateTimeObj = new \DateTime;
        $this->article->setUpdatedDate($dateTimeObj);

        $this->assertSame($dateTimeObj, $this->article->getUpdatedDate());
    }
}