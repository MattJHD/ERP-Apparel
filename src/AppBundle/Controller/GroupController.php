<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Group;

use JMS\Serializer\SerializerBuilder;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


/**
 * Description of GroupController
 *
 * @author matthieudurand
 */
class GroupController extends Controller{
    
     /**
     * @Route("/groups")
     * @ApiDoc(
     *  description="Récupère la liste des groupes de l'application",
     *  filters={
     *      {"name"="groups", "dataType"="string"}
     *  },
     *    output= { "class"=Group::class, "collection"=true, "groups"={"Groups"} }
     * )
     */
    public function getGroupsAction(){
        //jms
        $serializer = SerializerBuilder::create()->build();

        $em = $this->getDoctrine()->getManager();
        $group = $em->getRepository(Group::class)->findAll();

        /*$group = new Group();
        
        $group->setName("group1");*/
             
        $data = $serializer->serialize($group, 'json');
        
        return new Response($data);
        
//        return $this->render('group/index.html.twig', [
//            'group' => $group,
//            'json' => $data,
//            ]
//        );
    }

    /**
     * @Route("/group/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     */
    public function getGroupAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $group = $em->getRepository(Group::class)->find($id);
        $data = $serializer->serialize($group, 'json');
        
        return new Response($data);
    }
    
    /**
     * @Method("POST")
     */
    public function postGroupAction(){
        
        $group = new Group();
        
    }

}
