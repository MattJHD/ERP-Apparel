<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @Method("GET")
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
     * @Route("/users/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère un utilisateur par son id",
     *  filters={
     *      {"name"="user", "dataType"="string"}
     *  },
     *    output= { "class"=User::class, "collection"=false}
     * )
     */
    public function getUserAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        
//        $d = $user->getDate_creation();
//        $dFormated = $d->format('d/m/Y');
//        $user->setDate_creation($dFormated);
        
        $data = $serializer->serialize($user, 'json');
        
        return new Response($data);
    }
    
     /**
     * @Route("/users")  
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
        
        //$jsonData = '{"id":"","role":"","name":"nameTestPostUser","firstname":"firstnameTestPostUser","login":"loginTestPostUser","password":"passwordtestPostUser","email":"emailTestPostUser","phone":"123456","function":"functionTestPostUser","date_creation":"","isactive":"1"}';
        $jsonData = $request->getContent();
        
        $user = $serializer->deserialize($jsonData, User::class, 'json');
        
        $errors = $this->get("validator")->validate($user);
        
        if(count($errors) == 0){
            $em = $this->getDoctrine()->getManager();
            
            //$user->setGroups(new ArrayCollection(array_map([$em, 'merge'], $serializer->toArray($user->getGroups()))));
            $groupsObject = $user->getGroups();
            $groupsCollection = new ArrayCollection();
            foreach($groupsObject as $key => $element){
                $groupsCollection->add($em->merge($element));
            }
            $user->setGroups($groupsCollection);
            //$user->setShops(new ArrayCollection(array_map([$em, 'merge'], $serializer->toArray($user->getShops()))));
            $shopsObject = $user->getShops();
            $shopsCollection = new ArrayCollection();
            foreach($shopsObject as $key => $element){
                $shopsCollection->add($em->merge($element));
            }
            $user->setShops($shopsCollection);
            
            $role = $em->merge($user->getRole());
            $user->setRole($role);
            
//        dump($user);
//        die();
            
            
            $em->persist($user);
            $em->flush();
            
            return new Response("OK");
        }else{
            return $errors;
        }
        
    }
    
    /**
     * @Route("/users/{id}", requirements={"id":"\d+"})
     * @Method("PATCH")
     * @ApiDoc(
     *  description="Modification d'un utilisateur",
     *  filters={
     *      {"name"="user", "dataType"="string"}
     *  },
     *    output= { "class"=User::class, "collection"=false}
     * )
     */
    public function patchUserAction($id, Request $request){
        $serializer = SerializerBuilder::create()->build();
        
        $em = $this->getDoctrine()->getManager();
        
        $jsonData = $request->getContent();
        
        $user = new User();
        $thisUser = $serializer->deserialize($jsonData, User::class, 'json');
        $errors = $this->get("validator")->validate($thisUser);

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            
            $em->merge($thisUser);
            //$em->persist($article);
            
            $em->flush();
            return new Response("OK PATCH");
        } else {
            $errors = $form->getErrors(true);
            foreach($errors as $key => $value){
                dump($value);
            }
            die();
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }
    
}
