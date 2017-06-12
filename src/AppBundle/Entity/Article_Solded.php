<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Article_Solded
 *
 * @author matthieudurand
 * 
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleSoldedRepository")
 * @ORM\Table(name="apparel_article_solded")
 */
class Article_Solded {
    
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @Type("int")
     */
    private $id;
    
    /**
     * @ORM\OneToOne(targetEntity="Article", inversedBy="articleSolded", cascade={"persist"})
     * @Type("AppBundle\Entity\Article")
     */
    private $article;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Type("DateTime<'Y-m-d'>")
     */
    private $soldAt;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Type("string")
     */
    private $soldBy;
    
    //GETTER
    function getId() {
        return $this->id;
    }

    function getArticle() {
        return $this->article;
    }

    function getSoldAt() {
        return $this->soldAt;
    }

    function getSoldBy() {
        return $this->soldBy;
    }

    //SETTER
    function setId($id) {
        $this->id = $id;
    }

    function setArticle($article) {
        $this->article = $article;
    }

    function setSoldAt($soldAt) {
        $this->soldAt = $soldAt;
    }

    function setSoldBy($soldBy) {
        $this->soldBy = $soldBy;
    }


    
}
