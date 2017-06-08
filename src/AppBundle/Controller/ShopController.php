<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

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
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère la liste des magasins de l'application",
     *  filters={
     *      {"name"="shop", "dataType"="string"}
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
     * @Route("/shops/{id}", requirements={"id":"\d+"})
     * @Method("GET")
      * @ApiDoc(
     *  description="Récupère un magasin par son id",
     *  filters={
     *      {"name"="shop", "dataType"="string"}
     *  },
     *    output= { "class"=Shop::class, "collection"=false}
     * )
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
     * @Route("/shops")
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'un magasin",
     *  filters={
     *      {"name"="shop", "dataType"="string"}
     *  },
     *    output= { "class"=Shop::class, "collection"=false}
     * )
     */
    public function postShopAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = $request->getContent();
        
        $shop = $serializer->deserialize($jsonData, Shop::class, 'json');
        
        $errors = $this->get("validator")->validate($shop);
        
        if(count($errors) == 0){
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($shop);
            $em->flush();
            
            return new JsonResponse("OK");
        }else{
            return $errors;
        }
        
    }
    
    /**
     * @Route("/shops/{id}", requirements={"id":"\d+"})
     * @Method("PUT")
     * @ApiDoc(
     *  description="Modification d'un magasin",
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
    
        $thisShop = $serializer->deserialize($jsonData, Shop::class, 'json');
        $errors = $this->get("validator")->validate($thisShop);

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            
            $em->merge($thisShop);
            
            $em->flush();
            return new JsonResponse("OK PUT");
        } else {
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }
}
