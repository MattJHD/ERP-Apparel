<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of USER
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="apparel_user")
 */
class User {
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
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     * @Type("string")
     */
    private $firstname;
    
    /**
     * @ORM\Column(type="string")
     * @Type("string")
     */
    private $login;
    
    /**
     * @ORM\Column(type="string")
     * @Type("string")
     */
    private $password;
    
    /**
     * @ORM\Column(type="string")
     * @Type("string")
     */
    private $email;
    
    /**
     * @ORM\Column(type="integer")
     * @Type("int")
     */
    private $phone;
    
    /**
     * @ORM\Column(type="string")
     * @Type("string")
     */
    private $function;
    
    /**
     * @ORM\Column(type="datetime")
     * @Type("DateTime<'Y-m-d'>")
     */
    private $date_creation;
    
    /**
     * @ORM\Column(type="boolean")
     * @Type("boolean")
     */
    private $isactive;
    
    /**
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users")
     * @Type("ArrayCollection<AppBundle\Entity\Group>")
     */
    private $groups;
    
    /**
     * @ORM\ManyToMany(targetEntity="Shop", inversedBy="users")
     * @Type("ArrayCollection<AppBundle\Entity\Shop>")
     */
    private $shops;
    
    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="users")
     * @Type("AppBundle\Entity\Role")
     */
    private $role;
    
    
    
    public function __construct() {
       $this->groupes = new \Doctrine\Common\Collections\ArrayCollection();
       $this->shops = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    //GETTER
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone() {
        return $this->phone;
    }

    function getFunction() {
        return $this->function;
    }

    function getDate_creation() {
        return $this->date_creation;
    }

    function getIsactive() {
        return $this->isactive;
    }

    function getGroups() {
        return $this->groups;
    }

    function getShops() {
        return $this->shops;
    }

    function getRole() {
        return $this->role;
    }

        
    
    //SETTER
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setFunction($function) {
        $this->function = $function;
    }

    function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    function setIsactive($isactive) {
        $this->isactive = $isactive;
    }

    function setGroups($groups) {
        $this->groups = $groups;
    }

    function setShops($shops) {
        $this->shops = $shops;
    }

    function setRole($role) {
        $this->role = $role;
    }








    /**
     * Set date_creation
     *
     * @param \DateTime $dateCreation
     * @return User
     */
    public function setDateCreation($dateCreation)
    {
        $this->date_creation = $dateCreation;

        return $this;
    }

    /**
     * Get date_creation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Add groups
     *
     * @param \AppBundle\Entity\Group $groups
     * @return User
     */
    public function addGroup(\AppBundle\Entity\Group $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \AppBundle\Entity\Group $groups
     */
    public function removeGroup(\AppBundle\Entity\Group $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Add shops
     *
     * @param \AppBundle\Entity\Shop $shops
     * @return User
     */
    public function addShop(\AppBundle\Entity\Shop $shops)
    {
        $this->shops[] = $shops;

        return $this;
    }

    /**
     * Remove shops
     *
     * @param \AppBundle\Entity\Shop $shops
     */
    public function removeShop(\AppBundle\Entity\Shop $shops)
    {
        $this->shops->removeElement($shops);
    }
}
