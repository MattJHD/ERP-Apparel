<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Permission;

use JMS\Serializer\SerializerBuilder;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Description of MaterialController
 *
 * @author matthieudurand
 */
class PermissionController extends Controller{
    /**
     * @Method("GET")
     * @Route("/permissions")
     * @ApiDoc(
     *  description="Récupère la liste des permissions de l'application",
     *  filters={
     *      {"name"="permissions", "dataType"="string"}
     *  },
     *    output= { "class"=Permission::class, "collection"=true, "groups"={"Permissions"} }
     * )
     */
    public function getPermissionsAction(){
        //jms
        $serializer = SerializerBuilder::create()->build();

        $em = $this->getDoctrine()->getManager();
        $permission = $em->getRepository(Permission::class)->findAll();

        /*$permission = new Permission();
        
        $permission->setLibelle("permiTest");*/
       
        
        $data = $serializer->serialize($permission, 'json');
        
        return new Response($data);
        
//        return $this->render('permission/index.html.twig', [
//            'permission' => $permission,
//            'json' => $data,
//            ]
//        );
    }

    /**
     * @Route("/permissions/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère une permission par son id",
     *  filters={
     *      {"name"="permissions", "dataType"="string"}
     *  },
     *    output= { "class"=Permission::class, "collection"=false}
     * )
     */
    public function getPermissionAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $permission = $em->getRepository(Permission::class)->find($id);
        $data = $serializer->serialize($permission, 'json');
        
        return new Response($data);
    }
    
    /**
     * @Route("/permissions")
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'un permission",
     *  filters={
     *      {"name"="permissions", "dataType"="string"}
     *  },
     *    output= { "class"=Permission::class, "collection"=false}
     * )
     */
    public function postPermissionAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = $request->getContent();
        
        $permission = $serializer->deserialize($jsonData, Permission::class, 'json');

        $errors = $this->get("validator")->validate($permission);
        
        if(count($errors) == 0){
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($permission);
            $em->flush();
            
            return new Response("OK");
        }else{
            return $errors;
        }
        
    }
    
    /**
     * @Route("/permissions/{id}", requirements={"id":"\d+"})
     * @Method("PUT")
     * @ApiDoc(
     *  description="Modification d'un permissions",
     *  filters={
     *      {"name"="permission", "dataType"="string"}
     *  },
     *    output= { "class"=Permission::class, "collection"=false}
     * )
     */
    public function putPermissionAction($id, Request $request){
        $serializer = SerializerBuilder::create()->build();
        
        $em = $this->getDoctrine()->getManager();
        
        $jsonData = $request->getContent();
    
        $thisPermission = $serializer->deserialize($jsonData, Permission::class, 'json');
        $errors = $this->get("validator")->validate($thisPermission);

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            
            $em->merge($thisPermission);
            
            $em->flush();
            return new Response("OK");
        } else {
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }
}
