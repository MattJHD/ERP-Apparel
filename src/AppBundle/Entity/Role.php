<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of ROLE
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleRepository")
 * @ORM\Table(name="apparel_role")
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
     * @ORM\Column()
     */
    private $libelle;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Permission", inversedBy="roles")
     */
    private $permissions;
    
    
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
    
    function getLibelle() {
        return $this->libelle;
    }
        
    function getPermissions() {
        return $this->permissions;
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

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    function setPermissions($permissions) {
        $this->permissions = $permissions;
    }


    


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permissions = new \Doctrine\Common\Collections\ArrayCollection();
    }


}
