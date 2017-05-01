<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Color;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Description of ColorController
 *
 * @author matthieudurand
 */
class ColorController extends Controller{
    /**
     * @Route("/colors")
     */
    public function getColorsAction(){
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

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
