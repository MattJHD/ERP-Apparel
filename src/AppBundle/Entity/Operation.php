<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Operation
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="ACLBundle\Repository\OperationRepository")
 * @ORM\Table(name="Apparel_Operation")
 */
class Operation {
   
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Privilege", inversedBy="operations")
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
