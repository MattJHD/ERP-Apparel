<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;

use JMS\Serializer\SerializerBuilder;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Description of UserController
 *
 * @author matthieudurand
 * 
 */
class UserController extends Controller{
    
    /**
     * @Route("/users")
     * @ApiDoc(
     *  description="Récupère la liste des utilisateurs de l'application",
     *  filters={
     *      {"name"="users", "dataType"="string"}
     *  },
     *    output= { "class"=User::class, "collection"=true, "groups"={"User"} }
     * )
     * 
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
     * @Route("/user/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     */
    public function getUserAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $data = $serializer->serialize($user, 'json');
        
        return new Response($data);
    }
    
     /**
     * @Route("/user")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'un utilisateur",
     *  filters={
     *      {"name"="user", "dataType"="string"}
     *  },
     *    output= { "class"=User::class, "collection"=false}
     * )
     */
    public function postUserAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = '{"id":"","role":"","name":"nameTestPostUser","firstname":"firstnameTestPostUser","login":"loginTestPostUser","password":"passwordtestPostUser","email":"emailTestPostUser","phone":"123456","function":"functionTestPostUser","date_creation":"","isactive":"1"}';
        
        $object = $serializer->deserialize($jsonData, User::class, 'json');
        
        $user = new User();
        
        $form = $this->createForm(UserType::class, $user);
        
        $form->submit($request->request->all());
        
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            
            return new Response("OK");
        }else{
            return $form;
        }
        
    }
}
