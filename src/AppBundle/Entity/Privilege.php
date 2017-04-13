<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Privilege
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="ACLBundle\Repository\PrivilegeRepository")
 * @ORM\Table(name="Apparel_Privilege")
 */
class Privilege {
    
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="privileges")
     */
    private $role;
    
    //GETTER
    function getId() {
    return $this->id;
    }

    function getRole() {
        return $this->role;
    }
    
    //SETTER
    function setId($id) {
        $this->id = $id;
    }

    function setRole($role) {
        $this->role = $role;
    }


    
}
