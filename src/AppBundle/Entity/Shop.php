<?php

namespace AppBundle\Entity;

/**
 * Description of Shop
 *
 * @author matthieudurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShopRepository")
 * @ORM\Table(name="Apparel_Shop")
 */
class Shop {
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
     * @ORM\Column(type="string")
     */
    private $localisation;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="shops")
     */
    private $users;
}
