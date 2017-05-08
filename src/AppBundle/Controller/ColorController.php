<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Color;

use JMS\Serializer\SerializerBuilder;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Description of ColorController
 *
 * @author matthieudurand
 */
class ColorController extends Controller{
    
     /**
     * @Route("/colors")
     * @ApiDoc(
     *  description="Récupère la liste des couleurs de l'application",
     *  filters={
     *      {"name"="colors", "dataType"="string"}
     *  },
     *    output= { "class"=Color::class, "collection"=true, "groups"={"Colors"} }
     * )
     */
    public function getColorsAction(){
        //jms
        $serializer = SerializerBuilder::create()->build();

        $em = $this->getDoctrine()->getManager();
        $color = $em->getRepository(Color::class)->findAll();

        /*$color = new Color();
        
        $color->setName("Grey");*/
       
        
        $data = $serializer->serialize($color, 'json');
        
        return new Response($data);
        
//        return $this->render('color/index.html.twig', [
//            'color' => $color,
//            'json' => $data,
//            ]
//        );
    }
    
    /**
     * @Method("POST")
     */
    public function postColorAction(){
        
        $article = new Color();
        
    }
}
