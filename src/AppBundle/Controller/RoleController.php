<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Role;

use JMS\Serializer\SerializerBuilder;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
/**
 * Description of RoleController
 *
 * @author matthieudurand
 */
class RoleController extends Controller{
     /**
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
     * @Route("/role/{id}", requirements={"id":"\d+"})
     * @Method("GET")
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
     * @Method("POST")
     */
    public function postRoleAction(){
        
        $role = new Role();
        
    }
}
