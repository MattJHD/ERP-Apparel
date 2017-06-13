<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Group;
use AppBundle\Form\GroupType;

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
     * @Method("GET")
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
     * @Route("/groups/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère un groupe par son id",
     *  filters={
     *      {"name"="group", "dataType"="string"}
     *  },
     *    output= { "class"=Group::class, "collection"=false}
     * )
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
     * @Route("/groups")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'un groupe",
     *  filters={
     *      {"name"="group", "dataType"="string"}
     *  },
     *    output= { "class"=Group::class, "collection"=false}
     * )
     */
    public function postGroupAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = $request->getContent();
        
        $group = $serializer->deserialize($jsonData, Group::class, 'json');

        $errors = $this->get("validator")->validate($group);
        
        if(count($errors) == 0){
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();
            
            return new JsonResponse("OK");
        }else{
            return $errors;
        }
        
    }
    
    /**
     * @Route("/groups/{id}", requirements={"id":"\d+"})
     * @Method("PUT")
     * @ApiDoc(
     *  description="Modification d'un groupe",
     *  filters={
     *      {"name"="groupe", "dataType"="string"}
     *  },
     *    output= { "class"=Group::class, "collection"=false}
     * )
     */
    public function putGroupAction($id, Request $request){
        $serializer = SerializerBuilder::create()->build();
        
        $em = $this->getDoctrine()->getManager();
        
        $jsonData = $request->getContent();
    
        $thisGroup = $serializer->deserialize($jsonData, Group::class, 'json');
        $errors = $this->get("validator")->validate($thisGroup);

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            
            $em->merge($thisGroup);
            
            $em->flush();
            return new JsonResponse("OK PUT");
        } else {
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }

}
