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





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->privileges = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add privileges
     *
     * @param \AppBundle\Entity\Privilege $privileges
     * @return Role
     */
    public function addPrivilege(\AppBundle\Entity\Privilege $privileges)
    {
        $this->privileges[] = $privileges;

        return $this;
    }

    /**
     * Remove privileges
     *
     * @param \AppBundle\Entity\Privilege $privileges
     */
    public function removePrivilege(\AppBundle\Entity\Privilege $privileges)
    {
        $this->privileges->removeElement($privileges);
    }
}
