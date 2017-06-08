<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Material;
use AppBundle\Form\MaterialType;

use JMS\Serializer\SerializerBuilder;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Description of MaterialController
 *
 * @author matthieudurand
 */
class MaterialController extends Controller{
    /**
     * @Route("/materials")
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère la liste des materiaux de l'application",
     *  filters={
     *      {"name"="materials", "dataType"="string"}
     *  },
     *    output= { "class"=Material::class, "collection"=true, "groups"={"Materials"} }
     * )
     */
    public function getMaterialsAction(){
        //jms
        $serializer = SerializerBuilder::create()->build();

        $em = $this->getDoctrine()->getManager();
        $material = $em->getRepository(Material::class)->findAll();

        /*$material = new Material();
        
        $material->setName("Cotton");*/
       
        
        $data = $serializer->serialize($material, 'json');
        
        return new Response($data);
        
//        return $this->render('material/index.html.twig', [
//            'material' => $material,
//            'json' => $data,
//            ]
//        );
    }

    /**
     * @Route("/materials/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère une matière par son id",
     *  filters={
     *      {"name"="material", "dataType"="string"}
     *  },
     *    output= { "class"=Material::class, "collection"=false}
     * )
     */
    public function getMaterialAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $material = $em->getRepository(Material::class)->find($id);
        $data = $serializer->serialize($material, 'json');
        
        return new Response($data);
    }
    
    /**
     * @Route("/materials")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'une matière",
     *  filters={
     *      {"name"="material", "dataType"="string"}
     *  },
     *    output= { "class"=Material::class, "collection"=false}
     * )
     */
    public function postMaterialAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = $request->getContent();
        
        $material = $serializer->deserialize($jsonData, Material::class, 'json');
        
        $errors = $this->get("validator")->validate($material);
        
        if(count($errors) == 0){
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($material);
            $em->flush();
            
            return new JsonResponse("OK");
        }else{
            return $errors;
        }
        
    }
    
    /**
     * @Route("/materials/{id}", requirements={"id":"\d+"})
     * @Method("PUT")
     * @ApiDoc(
     *  description="Modification d'une matière",
     *  filters={
     *      {"name"="material", "dataType"="string"}
     *  },
     *    output= { "class"=Material::class, "collection"=false}
     * )
     */
    public function putMaterialAction($id, Request $request){
        $serializer = SerializerBuilder::create()->build();
        
        $em = $this->getDoctrine()->getManager();
        
        $jsonData = $request->getContent();
    
        $thisMaterial = $serializer->deserialize($jsonData, Material::class, 'json');
        $errors = $this->get("validator")->validate($thisMaterial);

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            
            $em->merge($thisMaterial);
            
            $em->flush();
            return new JsonResponse("OK PUT");
        } else {
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }
}
