<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Article
 *
 * @author wbloch
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleRepository")
 * @ORM\Table(name="Apparel_Article")
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
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Material", inversedBy="articles")
     */
    private $materials;

     /**
     * @ORM\Column(type="string")
     * @ORM\ManyToMany(targetEntity="Color", inversedBy="articles")
     */
    private $colors;

    /**
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="articles")
     */
    private $brand;
    
    /**
     * @ORM\ManyToOne(targetEntity="Shop", inversedBy="articles")
     */
    private $shop;


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

    function setMaterials($materials) {
        $this->materials = $materials;
    }

    function setColors($colors) {
        $this->colors = $colors;
    }

    function setBrand($brand) {
        $this->brand = $brand;
    }

    function setShop($shop) {
        $this->shop = $shop;
    }




}
