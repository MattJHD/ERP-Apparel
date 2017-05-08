<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Category;

use JMS\Serializer\SerializerBuilder;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Description of CategoryController
 *
 * @author matthieudurand
 */
class CategoryController extends Controller{
    
     /**
     * @Route("/categories")
     * @ApiDoc(
     *  description="Récupère la liste des categories de l'application",
     *  filters={
     *      {"name"="categories", "dataType"="string"}
     *  },
     *    output= { "class"=Category::class, "collection"=true, "groups"={"Categories"} }
     * )
     */
    public function getCategoriesAction(){
        //jms
        $serializer = SerializerBuilder::create()->build();

        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(Category::class)->findAll();

        /*$category = new Category();
        
        $category->setName("Shoes");*/
       
        
        $data = $serializer->serialize($category, 'json');
        
        return new Response($data);
        
//        return $this->render('category/index.html.twig', [
//            'category' => $category,
//            'json' => $data,
//            ]
//        );
    }
    
    /**
     * @Method("POST")
     */
    public function postCategoryAction(){
        
        $category = new Category();
        
    }
}
