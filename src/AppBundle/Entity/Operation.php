<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Operation
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="ACLBundle\Repository\OperationRepository")
 * @ORM\Table(name="apparel_operation")
 */
class Operation {
   
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    private $id;
    
    /**
     * @ORM\Column()
     * @ORM\Column(type="string")
     * @Assert\NotNull()
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
