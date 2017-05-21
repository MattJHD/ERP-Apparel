<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Shop
 *
 * @author matthieudurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShopRepository")
 * @ORM\Table(name="apparel_shop")
 */
class Shop {
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
     * @Type("string")
     */
    private $name;
    
    /**
     * @ORM\Column(type="string")
     * @Type("string")
     */
    private $localisation;
    
//    /**
//     *
//     * @ORM\ManyToMany(targetEntity="User", mappedBy="shops")
//     * @Type("ArrayCollection<AppBundle\Entity\User>")
//     */
//    private $users;
    
//    /**
//     *
//     * @ORM\OneToMany(targetEntity="Article", mappedBy="shop")
//     * @Type("AppBundle\Entity\Article")
//     */
//    private $articles;

    
    
    //GETTERS
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getLocalisation() {
        return $this->localisation;
    }

    function getUsers() {
        return $this->users;
    }

    function getArticles() {
        return $this->articles;
    }

        
    
    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    function setUsers($users) {
        $this->users = $users;
    }

    function setArticles($articles) {
        $this->articles = $articles;
    }

        

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add users
     *
     * @param \AppBundle\Entity\User $users
     * @return Shop
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
