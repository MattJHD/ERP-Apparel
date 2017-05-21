<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Article
 *
 * @author wbloch
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BrandRepository")
 * @ORM\Table(name="apparel_brand")
 */
class Brand {
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Type("int")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Type("string")
     */
    private $name;
    
//     /**
//     *
//     * @ORM\OneToMany(targetEntity="Article", mappedBy="brand")
//     * @Type("AppBundle\Entity\Article")
//     */
//    private $articles;


    //GETTER
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getArticles() {
        return $this->articles;
    }

    

    //SETTER
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setArticles($articles) {
        $this->articles = $articles;
    }


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add articles
     *
     * @param \AppBundle\Entity\Article $articles
     * @return Brand
     */
    public function addArticle(\AppBundle\Entity\Article $articles)
    {
        $this->articles[] = $articles;

        return $this;
    }

    /**
     * Remove articles
     *
     * @param \AppBundle\Entity\Article $articles
     */
    public function removeArticle(\AppBundle\Entity\Article $articles)
    {
        $this->articles->removeElement($articles);
    }
}
