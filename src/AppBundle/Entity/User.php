<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of USER
 *
 * @author mdurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="Apparel_User")
 */
class User {
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
    private $name;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     */
    private $firstname;
    
    /**
     * @ORM\Column(type="string")
     */
    private $login;
    
    /**
     * @ORM\Column(type="string")
     */
    private $password;
    
    /**
     * @ORM\Column(type="string")
     */
    private $email;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $phone;
    
    /**
     * @ORM\Column(type="string")
     */
    private $function;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $date_creation;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $isactive;
    
    /**
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users")
     */
    private $groups;
    
    /**
     * @ORM\ManyToMany(targetEntity="Shop", inversedBy="users")
     */
    private $shops;
    
    
    
    public function __construct() {
       $this->groupes = new \Doctrine\Common\Collections\ArrayCollection();
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







}
