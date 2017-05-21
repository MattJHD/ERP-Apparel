<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Permission
 *
 * @author matthieudurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PermissionRepository")
 * @ORM\Table(name="apparel_permission")
 */
class Permission {
    
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @Type("int")
     */
    private $id;
    
    /**
     * @ORM\Column()
     * 
     * @Type("string")
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity="Role", mappedBy="permissions")
     * 
     * @Type("ArrayCollection<AppBundle\Entity\Role>")
     */
    private $roles;
    
    //GETTERS
    function getId() {
        return $this->id;
    }
    
    function getLibelle() {
        return $this->libelle;
    }

     function getRoles() {
        return $this->roles;
    }
    
    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

     function setRoles($roles) {
        $this->roles = $roles;
    }


     /**
     * Constructor
     */
    public function __construct()
    {
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
