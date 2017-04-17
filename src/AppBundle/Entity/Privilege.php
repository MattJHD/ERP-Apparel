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
    
    /**
     * @ORM\OneToOne(targetEntity="Resource", mappedBy="privilege")
     */
    private $resource;
    
    /**
     * @ORM\OneToMany(targetEntity="Operation", mappedBy="privilege")
     */
    private $operations;
    
    //GETTERS
    function getId() {
    return $this->id;
    }

    function getRole() {
        return $this->role;
    }
    
    function getResource() {
        return $this->resource;
    }

    function getOperations() {
        return $this->operations;
    }

        
    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setRole($role) {
        $this->role = $role;
    }
    
    function setResource($resource) {
        $this->resource = $resource;
    }

    function setOperations($operations) {
        $this->operations = $operations;
    }



    
}
