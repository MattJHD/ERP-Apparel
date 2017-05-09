<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Brand;

use JMS\Serializer\SerializerBuilder;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Description of BrandController
 *
 * @author matthieudurand
 */
class BrandController extends Controller{
    

    /**
     * @Route("/brands")
     * @ApiDoc(
     *  description="Récupère la liste des marques de l'application",
     *  filters={
     *      {"name"="brands", "dataType"="string"}
     *  },
     *    output= { "class"=Brand::class, "collection"=true, "groups"={"Brand"} }
     * )
     */
    public function getBrandsAction(){
        //jms
        $serializer = SerializerBuilder::create()->build();

        $em = $this->getDoctrine()->getManager();
        $brand = $em->getRepository(Brand::class)->findAll();

      /*  $brand = new Brand();
        
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
     * @Route("/brand/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     */
    public function getBrandAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $brand = $em->getRepository(Brand::class)->find($id);
        $data = $serializer->serialize($brand, 'json');
        
        return new Response($data);
    }

    
    /**
     * @Method("POST")
     */
    public function postBrandAction(){
        
        $brand = new Brand();
        
    }
}
