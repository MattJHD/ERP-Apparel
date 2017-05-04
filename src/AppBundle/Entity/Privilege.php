<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Privilege
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="ACLBundle\Repository\PrivilegeRepository")
 * @ORM\Table(name="apparel_privilege")
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
     * @ORM\ManyTomany(targetEntity="Operation", inversedBy="privileges")
     */
    private $operations;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="Resource", inversedBy="privilege")
     */
    private $resource;
    
    //GETTERS
    function getId() {
    return $this->id;
    }

    function getRole() {
        return $this->role;
    }

    function getOperations() {
        return $this->operations;
    }
    
    function getResource() {
        return $this->resource;
    }

    
    
        
    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setRole($role) {
        $this->role = $role;
    }
   
    function setOperations($operations) {
        $this->operations = $operations;
    }

        function setResource($resource) {
        $this->resource = $resource;
    }

    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return Privilege
     */
    public function addOperation(\AppBundle\Entity\Operation $operations)
    {
        $this->operations[] = $operations;

        return $this;
    }

    /**
     * Remove operations
     *
     * @param \AppBundle\Entity\Operation $operations
     */
    public function removeOperation(\AppBundle\Entity\Operation $operations)
    {
        $this->operations->removeElement($operations);
    }
}
