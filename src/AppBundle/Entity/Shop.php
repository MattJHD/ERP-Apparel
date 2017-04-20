<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
    
    
    //GETTERS
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getLocalisation() {
        return $this->localisation;
    }

    function getUsers() {
        return $this->users;
    }

    
    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    function setUsers($users) {
        $this->users = $users;
    }


}
