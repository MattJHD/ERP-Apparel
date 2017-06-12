<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Role;
use Doctrine\Common\Collections\ArrayCollection;

use JMS\Serializer\SerializerBuilder;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
/**
 * Description of RoleController
 *
 * @author matthieudurand
 */
class RoleController extends Controller{
     /**
     * @Method("GET")
     * @Route("/roles")
     * @ApiDoc(
     *  description="Récupère la liste des roles de l'application",
     *  filters={
     *      {"name"="roles", "dataType"="string"}
     *  },
     *    output= { "class"=Role::class, "collection"=true, "groups"={"Roles"} }
     * )
     */
    public function getRolesAction(){
        //jms
        $serializer = SerializerBuilder::create()->build();

        $em = $this->getDoctrine()->getManager();
        $role = $em->getRepository(Role::class)->findAll();

        /*$role = new Role();
        
        $role->setName("role1");*/
             
        $data = $serializer->serialize($role, 'json');
        
        return new Response($data);
        
//        return $this->render('role/index.html.twig', [
//            'role' => $role,
//            'json' => $data,
//            ]
//        );
    }


    /**
     * @Route("/roles/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère un role par son id",
     *  filters={
     *      {"name"="role", "dataType"="string"}
     *  },
     *    output= { "class"=Role::class, "collection"=false}
     * )
     */
    public function getRoleAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $role = $em->getRepository(Role::class)->find($id);
        $data = $serializer->serialize($role, 'json');
        
        return new Response($data);
    }
    
    /**
     * @Route("/roles")
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'un role",
     *  filters={
     *      {"name"="role", "dataType"="string"}
     *  },
     *    output= { "class"=Role::class, "collection"=false}
     * )
     */
    public function postRoleAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = $request->getContent();
        
        $role = $serializer->deserialize($jsonData, Role::class, 'json');

        $errors = $this->get("validator")->validate($role);
        
        if(count($errors) == 0){
            $em = $this->getDoctrine()->getManager();
            
            $rolesObject = $role->getPermissions();
            $rolesCollection = new ArrayCollection();
            foreach($rolesObject as $key => $element){
                $rolesCollection->add($em->merge($element));
            }
            $role->setPermissions($rolesCollection);
            
            $em->persist($role);
            $em->flush();
            
            return new JsonResponse("OK");
        }else{
            return $errors;
        }
        
    }
    
    /**
     * @Route("/roles/{id}", requirements={"id":"\d+"})
     * @Method("PUT")
     * @ApiDoc(
     *  description="Modification d'un role",
     *  filters={
     *      {"name"="groupe", "dataType"="string"}
     *  },
     *    output= { "class"=Role::class, "collection"=false}
     * )
     */
    public function putGroupAction($id, Request $request){
        $serializer = SerializerBuilder::create()->build();
        
        $em = $this->getDoctrine()->getManager();
        
        $jsonData = $request->getContent();
    
        $thisRole = $serializer->deserialize($jsonData, Role::class, 'json');
        $errors = $this->get("validator")->validate($thisRole);

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            
            $em->merge($thisRole);
            
            $em->flush();
            return new JsonResponse("OK PATCH");
        } else {
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }
}
