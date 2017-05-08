<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Material;

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
     * @ApiDoc(
     *  description="Récupère la liste des materiaux de l'application",
     *  filters={
     *      {"name"="materials", "dataType"="string"}
     *  },
     *    output= { "class"=Material::class, "collection"=true, "groups"={"Materials"} }
     * )
     */
    public function getColorsAction(){
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
     * @Method("POST")
     */
    public function postMaterialAction(){
        
        $article = new Material();
        
    }
}
