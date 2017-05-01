<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Material;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Description of MaterialController
 *
 * @author matthieudurand
 */
class MaterialController extends Controller{
    
    /**
     * @Route("/materials")
     */
    public function getMaterialsAction(){
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $material = $em->getRepository(Material::class)->findAll();

        /*$material = new Material();
        
        $material->setName("Toto");*/
        
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
