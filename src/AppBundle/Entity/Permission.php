<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     */
    private $id;
    
    /**
     * @ORM\Column()
     */
    private $libelle;
    
    //GETTERS
    function getId() {
        return $this->id;
    }
    
    function getLibelle() {
        return $this->libelle;
    }
    


    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }


}
