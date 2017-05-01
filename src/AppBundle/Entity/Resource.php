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
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     */
    private $libelle;
    
    /**
     * @ORM\OneToOne(targetEntity="Privilege")
     */
    private $privilege;
    
    
    //GETTERS
    function getId() {
        return $this->id;
    }
    
    function getLibelle() {
        return $this->libelle;
    }
    
    function getPrivilege() {
        return $this->privilege;
    }

    
    //SETTERS
    function setId($id) {
        $this->id = $id;
    }
    
    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }
    
    function setPrivilege($privilege) {
        $this->privilege = $privilege;
    }


    
}
