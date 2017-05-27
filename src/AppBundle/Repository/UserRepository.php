<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
/**
 * Description of UserRepository
 *
 * @author mdurand
 */
class UserRepository extends EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($username) 
    {
        return $this->findOneBy(['username' => $username]);
    }
}
