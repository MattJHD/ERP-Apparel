<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of ROLE
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleRepository")
 * @ORM\Table(name="Apparel_Role")
 */
class Role {
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull()
     */
    private $idressource;
    
    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotNull()
     */
    private $isactive;
    
    /**
     * 
     */
    private $group;
    
    /**
     * @ORM\OneToMany(targetEntity="Privilege", mappedBy="role")
     */
    private $privileges;
    
    /**
     * 
     */
    private $application;
    
    /**
     * 
     */
    private $operations;
    
    //GETTER
    function getId() {
    return $this->id;
    }

    function getIdressource() {
        return $this->idressource;
    }
    
    function getIsactive() {
        return $this->isactive;
    }
   
    function getGroup() {
        return $this->group;
    }

    function getPrivileges() {
        return $this->privileges;
    }
    
    function getApplication() {
        return $this->application;
    }

    function getOperations() {
        return $this->operations;
    }

            
    //SETTER
    function setId($id) {
        $this->id = $id;
    }

    function setIdressource(type $idressource) {
        $this->idressource = $idressource;
    }
    
    function setIsactive($isactive) {
        $this->isactive = $isactive;
    }
    
    function setGroup($group) {
        $this->group = $group;
    }
    
    function setPrivileges($privileges) {
        $this->privileges = $privileges;
    }

    function setApplication($application) {
        $this->application = $application;
    }

    function setOperations($operations) {
        $this->operations = $operations;
    }




}
