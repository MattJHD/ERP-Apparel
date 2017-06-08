<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Category;
use AppBundle\Form\CategoryType;

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
     * @Method("GET")
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
     * @Route("/categories/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère une categorie par son id",
     *  filters={
     *      {"name"="category", "dataType"="string"}
     *  },
     *    output= { "class"=Category::class, "collection"=false}
     * )
     */
    public function getCategoryAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(Category::class)->find($id);
        $data = $serializer->serialize($category, 'json');
        
        return new Response($data);
    }
    
    /**
     * @Route("/categories")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'une categorie",
     *  filters={
     *      {"name"="category", "dataType"="string"}
     *  },
     *    output= { "class"=Category::class, "collection"=false}
     * )
     */
    public function postCategoryAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = $request->getContent();
        
        $category = $serializer->deserialize($jsonData, Category::class, 'json');
        
        $errors = $this->get("validator")->validate($category);
        
        if(count($errors) == 0){
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            
            return new JsonResponse("OK");
        }else{
            return $errors;
        }
        
    }
    
    /**
     * @Route("/categories/{id}", requirements={"id":"\d+"})
     * @Method("PUT")
     * @ApiDoc(
     *  description="Modification d'une catégorie",
     *  filters={
     *      {"name"="category", "dataType"="string"}
     *  },
     *    output= { "class"=Category::class, "collection"=false}
     * )
     */
    public function putCategoryAction($id, Request $request){
        $serializer = SerializerBuilder::create()->build();
        
        $em = $this->getDoctrine()->getManager();
        
        $jsonData = $request->getContent();
        
        $thisCategory = $serializer->deserialize($jsonData, Category::class, 'json');
        $errors = $this->get("validator")->validate($thisCategory);

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            
            $em->merge($thisCategory);
            //$em->persist($article);
            
            $em->flush();
            return new JsonResponse("OK PUT");
        } else {
//            $errors = $form->getErrors(true);
//            foreach($errors as $key => $value){
//                dump($value);
//            }
//            die();
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }
}
