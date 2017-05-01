<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Category;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Description of CategoryController
 *
 * @author matthieudurand
 */
class CategoryController extends Controller{
    
     /**
     * @Route("/categories")
     */
    public function getCategoriesAction(){
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

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
