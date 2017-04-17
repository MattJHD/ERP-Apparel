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
     * @ORM\Column(type="boolean")
     * @Assert\NotNull()
     */
    private $isactive;
    
    /**
     * @ORM\OneToOne(targetEntity="Group", inversedBy="role")
     */
    private $group;
    
    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="role")
     */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Privilege", mappedBy="role")
     */
    private $privileges;
    
    
    //GETTER
    function getId() {
    return $this->id;
    }

    function getIsactive() {
        return $this->isactive;
    }
   
    function getGroup() {
        return $this->group;
    }
    
    function getUser() {
        return $this->user;
    }
    
    function getPrivileges() {
        return $this->privileges;
    }
    
    function getApplication() {
        return $this->application;
    }

            
    //SETTER
    function setId($id) {
        $this->id = $id;
    }
    
    function setIsactive($isactive) {
        $this->isactive = $isactive;
    }
    
    function setGroup($group) {
        $this->group = $group;
    }
    
    function setUser($user) {
        $this->user = $user;
    }
        
    function setPrivileges($privileges) {
        $this->privileges = $privileges;
    }

    function setApplication($application) {
        $this->application = $application;
    }





}
