<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Shop;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
/**
 * Description of ShopController
 *
 * @author matthieudurand
 */
class ShopController extends Controller{
    
    /**
     * @Route("/shops")
     */
    public function getShopsAction(){
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $shop = $em->getRepository(Shop::class)->findAll();

        /*$shop = new Shop();
        
        $shop->setName("shop1");*/
        
        $data = $serializer->serialize($shop, 'json');
        
        return new Response($data);
        
//        return $this->render('shop/index.html.twig', [
//            'shop' => $shop,
//            'json' => $data,
//            ]
//        );
    }
    
    /**
     * @Method("POST")
     */
    public function postShopAction(){
        
        $shop = new Shop();
        
    }
}
