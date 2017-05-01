<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Article;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Category
 *
 * @author wbloch
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 * @ORM\Table(name="Apparel_Category")
 */
class Category {
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="Article", mappedBy="category")
     */
    private $article;


    //GETTER
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

   /* function getArticle() {
        return $this->article;
    }*/


    //SETTER
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setArticle($article) {
        $this->article = $article;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }

//    /**
//     * Add articles
//     *
//     * @param \AppBundle\Entity\Article $articles
//     * @return Category
//     */
//    public function addArticle(\AppBundle\Entity\Article $articles)
//    {
//        $this->articles[] = $articles;
//
//        return $this;
//    }
//
//    /**
//     * Remove articles
//     *
//     * @param \AppBundle\Entity\Article $articles
//     */
//    public function removeArticle(\AppBundle\Entity\Article $articles)
//    {
//        $this->articles->removeElement($articles);
//    }
}
