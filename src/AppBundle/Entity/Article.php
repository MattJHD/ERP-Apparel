<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Article
 *
 * @author wbloch
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 * @ORM\Table(name="apparel_article")
 */
class Article {
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
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string")
     */
    private $size;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="articles")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="Material", inversedBy="articles")
     */
    private $materials;

     /**
     * @ORM\ManyToMany(targetEntity="Color", inversedBy="articles")
     */
    private $colors;

    /**
     * @ORM\ManyToMany(targetEntity="Brand", inversedBy="articles")
     */
    private $brands;
    
    /**
     * @ORM\ManyToMany(targetEntity="Shop", inversedBy="articles")
     */
    private $shops;

    /**
     * @ORM\Column(type="boolean")
     */
    private $solded = false;
    
    /**
     * @ORM\Column(type="string")
     */
    private $soldBy;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $soldAt;
    

    //GETTERS
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function getSize() {
        return $this->size;
    }

    function getCategories() {
        return $this->categories;
    }

    function getMaterials() {
        return $this->materials;
    }

    function getColors() {
        return $this->colors;
    }
    
    function getBrands() {
        return $this->brands;
    }

    function getShops() {
        return $this->shops;
    }

    function getSolded() {
        return $this->solded;
    }

    function getSoldBy() {
        return $this->soldBy;
    }

    function getSoldAt() {
        return $this->soldAt;
    }

        
    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setSize($size) {
        $this->size = $size;
    }

    function setCategories($categories) {
        $this->categories = $categories;
    }
    
    function setMaterials($materials) {
        $this->materials = $materials;
    }

    function setColors($colors) {
        $this->colors = $colors;
    }
    
    function setBrands($brands) {
        $this->brands = $brands;
    }

    function setShops($shops) {
        $this->shops = $shops;
    }
        
    function setSolded($solded) {
        $this->solded = $solded;
    }

    function setSoldBy($soldBy) {
        $this->soldBy = $soldBy;
    }

    function setSoldAt($soldAt) {
        $this->soldAt = $soldAt;
    }




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->materials = new \Doctrine\Common\Collections\ArrayCollection();
        $this->colors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add materials
     *
     * @param \AppBundle\Entity\Material $materials
     * @return Article
     */
    public function addMaterial(\AppBundle\Entity\Material $materials)
    {
        $this->materials[] = $materials;

        return $this;
    }

    /**
     * Remove materials
     *
     * @param \AppBundle\Entity\Material $materials
     */
    public function removeMaterial(\AppBundle\Entity\Material $materials)
    {
        $this->materials->removeElement($materials);
    }


    /**
     * Add colors
     *
     * @param \AppBundle\Entity\Color $colors
     * @return Article
     */
    public function addColor(\AppBundle\Entity\Color $colors)
    {
        $this->colors[] = $colors;

        return $this;
    }

    /**
     * Remove colors
     *
     * @param \AppBundle\Entity\Color $colors
     */
    public function removeColor(\AppBundle\Entity\Color $colors)
    {
        $this->colors->removeElement($colors);
    }
}
