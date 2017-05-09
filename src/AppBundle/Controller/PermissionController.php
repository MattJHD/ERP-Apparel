<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/permission/{id}", requirements={"id":"\d+"})
     * @Method("GET")
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
     * @Method("POST")
     */
    public function postPermissionAction(){
        
        $permission = new Permission();
        
    }
}
