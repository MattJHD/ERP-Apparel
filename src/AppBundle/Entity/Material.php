<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Material
 *
 * @author wbloch
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MaterialRepository")
 * @ORM\Table(name="apparel_material")
 */
class Material {
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

    /**
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="materials")
     * @Type("ArrayCollection<AppBundle\Entity\Article>")
     */
    private $articles;

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
     * @return Material
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
