<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Group
 *
 * @author matthieudurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupRepository")
 * @ORM\Table(name="Apparel_Group")
 */
class Group {
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     */
    private $name;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="groups")
     */
    private $users;
    
    /**
     * @ORM\OneToOne(targetEntity="Role", mappedBy="group")
     */
    private $role;
    
    
    //GETTERS
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getUsers() {
        return $this->users;
    }

    function getRole() {
        return $this->role;
    }

    
    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setUsers($users) {
        $this->users = $users;
    }

    function setRole($role) {
        $this->role = $role;
    }


}
