<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Resource
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="ACLBundle\Repository\ResourceRepository")
 * @ORM\Table(name="apparel_resource")
 */
class Resource {
    
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    private $id;
    
    /**
     * @ORM\OneToOne(targetEntity="Privilege", inversedBy="resource")
     */
    private $privilege;
    
    
    //GETTERS
    function getId() {
        return $this->id;
    }

    function getPrivilege() {
        return $this->privilege;
    }

    
    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setPrivilege($privilege) {
        $this->privilege = $privilege;
    }


    
}
