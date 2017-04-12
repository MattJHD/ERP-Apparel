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
class USER {
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", name="iduser")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     */
    private $nom;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     */
    private $prenom;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     */
    private $login;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     */
    private $password;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     */
    private $email;
    
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull()
     */
    private $telephone;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     */
    private $fonction;
    
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotNull()
     */
    private $date_creation;
    
    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotNull()
     */
    private $isactive;
    
    /**
     * @ORM\ManyToMany(targetEntity="GROUPE", inversedBy="users")
     */
    private $groupes;
    
    public function __construct() {
       $this->groupes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    //GETTER
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
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

    function getTelephone() {
        return $this->telephone;
    }

    function getMobile() {
        return $this->mobile;
    }

    function getFonction() {
        return $this->fonction;
    }

    function getDate_creation() {
        return $this->date_creation;
    }
    
    function getIsactive() {
        return $this->isactive;
    }

        function getGroupes() {
        return $this->groupes;
    }

    
    
    //SETTER
    function setId($id) {
        $this->id = $id;
    }
    
    function setNom(type $nom) {
        $this->nom = $nom;
    }

    function setPrenom(type $prenom) {
        $this->prenom = $prenom;
    }

    function setLogin(type $login) {
        $this->login = $login;
    }

    function setPassword(type $password) {
        $this->password = $password;
    }

    function setEmail(type $email) {
        $this->email = $email;
    }

    function setTelephone(type $telephone) {
        $this->telephone = $telephone;
    }

    function setMobile(type $mobile) {
        $this->mobile = $mobile;
    }

    function setFonction(type $fonction) {
        $this->fonction = $fonction;
    }

    function setDate_creation(type $date_creation) {
        $this->date_creation = $date_creation;
    }
    
    function setIsactive($isactive) {
        $this->isactive = $isactive;
    }
    
    function setGroupes($groupes) {
        $this->groupes = $groupes;
    }





}
