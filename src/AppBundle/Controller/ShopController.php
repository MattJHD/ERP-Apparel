<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Shop;

use JMS\Serializer\SerializerBuilder;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
/**
 * Description of ShopController
 *
 * @author matthieudurand
 */
class ShopController extends Controller{
    /**
     * @Route("/shops")
     * @ApiDoc(
     *  description="Récupère la liste des magasins de l'application",
     *  filters={
     *      {"name"="shops", "dataType"="string"}
     *  },
     *    output= { "class"=Shop::class, "collection"=true, "groups"={"Shops"} }
     * )
     */
    public function getShopsAction(){
        //jms
        $serializer = SerializerBuilder::create()->build();

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
     * @Route("/shop/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     */
    public function getRoleAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $shop = $em->getRepository(Shop::class)->find($id);
        $data = $serializer->serialize($shop, 'json');
        
        return new Response($data);
    }
    
    /**
     * @Method("POST")
     */
    public function postShopAction(){
        
        $shop = new Shop();
        
    }
}
