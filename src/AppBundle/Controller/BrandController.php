<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Brand;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Description of BrandController
 *
 * @author matthieudurand
 */
class BrandController extends Controller{
    
     /**
     * @Route("/brands")
     */
    public function getBrandsAction(){
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $brand = $em->getRepository(Brand::class)->findAll();

        /*$brand = new Brand();
        
        $brand->setName("Zara");*/
        
        $data = $serializer->serialize($brand, 'json');
        
        return new Response($data);
        
//        return $this->render('brand/index.html.twig', [
//            'brand' => $brand,
//            'json' => $data,
//            ]
//        );
    }
    
    /**
     * @Method("POST")
     */
    public function postBrandAction(){
        
        $brand = new Brand();
        
    }
}
