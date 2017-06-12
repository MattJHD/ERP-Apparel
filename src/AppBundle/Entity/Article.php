<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\Common\Collections\ArrayCollection;

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
     * 
     * @Type("int")
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Type("string")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Type("int")
     */
    private $price;

    /**
     * @ORM\Column(type="string")
     * @Type("string")
     */
    private $size;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles", cascade={"persist", "remove", "merge"})
     * @Type("AppBundle\Entity\Category")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Material", inversedBy="articles", cascade={"persist", "remove", "merge"})
     * @Type("ArrayCollection<AppBundle\Entity\Material>")
     */
    private $materials;

     /**
     * @ORM\ManyToMany(targetEntity="Color", inversedBy="articles", cascade={"persist", "remove", "merge"})
      * @Type("ArrayCollection<AppBundle\Entity\Color>")
     */
    private $colors;

    /**
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="articles", cascade={"persist", "remove", "merge"})
     * @Type("AppBundle\Entity\Brand")
     */
    private $brand;
    
    /**
     * @ORM\ManyToOne(targetEntity="Shop", inversedBy="articles", cascade={"persist", "remove", "merge"})
     * @Type("AppBundle\Entity\Shop")
     */
    private $shop;

    /**
     * @ORM\Column(type="boolean")
     * @Type("boolean")
     */
    private $solded = false;

     /**
     * @ORM\Column(type="text", nullable=true)
     * @Type("string")
     */
    private $link;


    /**
     * @ORM\Column(type="boolean")
     * @Type("boolean")
     */
    private $onWebsite = false;
    
    /**
     * @ORM\Column(type="integer")
     * @Type ("int")
     */
    private $quantity;
    
    /**
     *@ORM\OneToOne(targetEntity="Article_Solded", mappedBy="article", cascade={"persist", "merge"})
     * @Type("AppBundle\Entity\Article_Solded")
     */
    private $articleSolded;
    

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
    
    function getCategory() {
        return $this->category;
    }
        
    function getMaterials() {
        return $this->materials;
    }

    function getColors() {
        return $this->colors;
    }
    
    function getBrand() {
        return $this->brand;
    }

    function getShop() {
        return $this->shop;
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

    function getLink() {
        return $this->link;
    }

    
    function getOnWebsite() {
        return $this->onWebsite;
    }
    
    function getQuantity() {
        return $this->quantity;
    }

    function getArticleSolded() {
        return $this->articleSolded;
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

    function setCategory($category) {
        $this->category = $category;
    }
            
    function setMaterials( $materials) {
        $this->materials = $materials;
        return $this;
    }

    function setColors( $colors) {
        $this->colors = $colors;
        return $this;
    }
    
    function setBrand($brand) {
        $this->brand = $brand;
    }

    function setShop($shop) {
        $this->shop = $shop;
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

    function setLink($link) {
        $this->link = $link;
    }
    
    
    function setOnWebsite($onWebsite) {
        $this->onWebsite = $onWebsite;
    }
    
    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function setArticleSolded($articleSolded) {
        $this->articleSolded = $articleSolded;
    }

        

    



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->materials = new ArrayCollection();
        $this->colors = new ArrayCollection();
    }

    /**
     * Add materials
     *
     * @param \AppBundle\Entity\Material $materials
     * @return Article
     */
    public function addMaterial(\AppBundle\Entity\Material $material = null)
    {
        $this->materials = add($material);
    }

    /**
     * Remove materials
     *
     * @param \AppBundle\Entity\Material $materials
     */
    public function removeMaterial(\AppBundle\Entity\Material $material)
    {
        $this->materials->removeElement($material);
    }


    /**
     * Add colors
     *
     * @param \AppBundle\Entity\Color $color
     * @return Article
     */
    public function addColor(\AppBundle\Entity\Color $color = null)
    {
        $this->colors = add($color);
    }

    /**
     * Remove colors
     *
     * @param \AppBundle\Entity\Color $color
     */
    public function removeColor(\AppBundle\Entity\Color $color)
    {
        $this->colors->removeElement($color);
    }
    
}
