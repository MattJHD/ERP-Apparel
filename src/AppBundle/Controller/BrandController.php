<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Brand;
use AppBundle\Form\BrandType;

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
     * @Method("GET")
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
     * @Route("/brands/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère une marque par son id",
     *  filters={
     *      {"name"="brands", "dataType"="string"}
     *  },
     *    output= { "class"=Brand::class, "collection"=false}
     * )
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
     * @Route("/brand")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'une marque",
     *  filters={
     *      {"name"="brand", "dataType"="string"}
     *  },
     *    output= { "class"=Brand::class, "collection"=false}
     * )
     */
    public function postBrandAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = '{"id":"","name":"brandTestPost"}';
        
        $object = $serializer->deserialize($jsonData, Brand::class, 'json');
        
        $brand = new Brand();
        
        $form = $this->createForm(BrandType::class, $brand);
        
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
