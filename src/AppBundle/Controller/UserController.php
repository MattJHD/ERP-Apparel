<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\User;

use JMS\Serializer\SerializerBuilder;

/**
 * Description of UserController
 *
 * @author matthieudurand
 * 
 */
class UserController extends Controller{
    
    /**
     * @Route("/users")
     */
    public function getUsersAction(){
        
        $serializer = SerializerBuilder::create()->build();

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findAll();

        /*$user = new User();
        
        $user->setName("titi");*/
        
        $data = $serializer->serialize($user, 'json');
        
        return new Response($data);
        
//        return $this->render('user/index.html.twig', [
//            'user' => $user,
//            'json' => $data,
//            ]
//        );
    }
    
    /**
     * @Method("POST")
     */
    public function postUserAction(){
        
        $user = new User();
        
    }
}
