<?php

namespace AppBundle\Entity;

/**
 * Description of Group
 *
 * @author matthieudurand
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupRepository")
 * @ORM\Table(name="Apparel_Group")
 */
class Group {
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
     * @ORM\ManyToMany(targetEntity="User", inversedBy="groups")
     */
    private $users;
    
    /**
     *
     * @var type 
     */
    private $roles;
    
    
    
    
}
