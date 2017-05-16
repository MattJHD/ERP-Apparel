<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Color;
use AppBundle\Form\ColorType;

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
     * @Method("GET")
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
     * @Route("/colors/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère une couleur par son id",
     *  filters={
     *      {"name"="color", "dataType"="string"}
     *  },
     *    output= { "class"=Color::class, "collection"=false}
     * )
     */
    public function getColorAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $color = $em->getRepository(Color::class)->find($id);
        $data = $serializer->serialize($color, 'json');
        
        return new Response($data);
    }

    /**
     * @Route("/color")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'une couleur",
     *  filters={
     *      {"name"="color", "dataType"="string"}
     *  },
     *    output= { "class"=Color::class, "collection"=false}
     * )
     */
    public function postColorAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = '{"id":"","name":"colorTestPost"}';
        
        $object = $serializer->deserialize($jsonData, Color::class, 'json');
        
        $color = new Color();
        
        $form = $this->createForm(ColorType::class, $color);
        
        $form->submit($request->request->all());
        
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            
            return new Response("OK");
        }else{
            return $form;
        }
        
    }
}
