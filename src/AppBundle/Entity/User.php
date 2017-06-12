<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of USER
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="apparel_user")
 */
class User implements UserInterface{
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
     * @var string
     * @ORM\Column(unique=true)
     * @Assert\NotNull()
     * @Assert\Length(max=255)
     * 
     * @Type("string")
     */
    private $username;
    
    /**
     * @var Salt
     * @ORM\Column()
     * @Assert\Length(max=255)
     * @Assert\Type("string")
     * @Assert\NotNull()
     * 
     * @Type("string")
     */
    private $salt;
    
    /**
     * @var string
     * @Assert\Length(max=4096)
     */
    private $rawPassword;
    /**
     * @var Password
     * @ORM\Column()
     * @Assert\Length(max=255)
     * @Assert\Type("string")
     * 
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
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users", cascade={"persist", "remove", "merge"})
     * @Type("ArrayCollection<AppBundle\Entity\Group>")
     */
    private $groups;
    
    /**
     * @ORM\ManyToMany(targetEntity="Shop", inversedBy="users", cascade={"persist", "remove", "merge"})
     * @Type("ArrayCollection<AppBundle\Entity\Shop>")
     */
    private $shops;
    
    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="users", cascade={"persist", "remove", "merge"})
     * @Type("AppBundle\Entity\Role")
     */
    private $role;
    
    
    
    public function __construct() {
       $this->groupes = new \Doctrine\Common\Collections\ArrayCollection();
       $this->shops = new \Doctrine\Common\Collections\ArrayCollection();
       
       $this->salt=md5(time());
       $this->date_creation = new \DateTime();
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

    function getUsername() {
        return $this->username;
    }

    function getSalt() {
        return $this->salt;
    }

    function getRawPassword() {
        return $this->rawPassword;
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

    function setUsername($username) {
        $this->username = $username;
    }

    function setSalt($salt) {
        $this->salt = $salt;
    }
    
    function setRawPassword($rawPassword) {
        $this->rawPassword = $rawPassword;
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
    
    public function getRoles() {
        return ['ROLE_ADMIN'];
    }
    
    public function eraseCredentials() {
        $this->rawPassword =null;
    }
}
