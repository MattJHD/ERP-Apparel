<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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
     *  description="Ajout d'un material",
     *  filters={
     *      {"name"="material", "dataType"="string"}
     *  },
     *    output= { "class"=Material::class, "collection"=false}
     * )
     */
    public function postMaterialAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = '{"id":"","name":"materialTestPost"}';
        
        $object = $serializer->deserialize($jsonData, Material::class, 'json');
        
        $material = new Material();
        
        $form = $this->createForm(MaterialType::class, $material);
        
        $form->submit($request->request->all());
        
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            
            return new Response("OK POST");
        }else{
            return $form;
        }
        
    }
}
