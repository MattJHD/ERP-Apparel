<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Group
 *
 * @author matthieudurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupRepository")
 * @ORM\Table(name="apparel_group")
 */
class Group {
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @Type("int")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     * @Type("string")
     */
    private $name;
    
//    /**
//     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
//     * 
//     * @Type("ArrayCollection<AppBundle\Entity\User>")
//     */
//    private $users;
    
    
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


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add users
     *
     * @param \AppBundle\Entity\User $users
     * @return Group
     */
    public function addUser(\AppBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \AppBundle\Entity\User $users
     */
    public function removeUser(\AppBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }
}
