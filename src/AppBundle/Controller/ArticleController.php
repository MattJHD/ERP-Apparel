<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;

use JMS\Serializer\SerializerBuilder;
use Doctrine\Common\Collections\ArrayCollection;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
/**
 * Description of ArticleController
 *
 * @author matthieudurand
 */
class ArticleController extends Controller {
    
    /**
     * @Route("/articles")
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère la liste des articles de l'application",
     *  filters={
     *      {"name"="articles", "dataType"="string"}
     *  },
     *    output= { "class"=Article::class, "collection"=true, "groups"={"Article"} }
     * )
     */
    public function getArticlesAction(){
        //jms
        $serializer = SerializerBuilder::create()->build();

        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository(Article::class)->findAll();
        
        /*$article = new Article();
        
        $article->setName("Toto");
        $article->setPrice("100");
        $article->setSize("S");
        $article->setCategory("Pantalon");
        $article->setMaterials("Chino");
        $article->setColors("Blue");
        $article->setBrand("Sandro");
        $article->setShop("Sandro");
        $article->setSoldBy("Martin");
        $article->setSoldAt("2017-04-22T00:00:00");*/
        
        $data = $serializer->serialize($article, 'json');
        
        return new Response($data);
        
//        return $this->render('article/index.html.twig', [
//            'article' => $article,
//            'json' => $data,
//            ]
//        );
    }
    
    /**
     * @Route("/articles/{id}", requirements={"id":"\d+"})
     * @Method("GET")
     * @ApiDoc(
     *  description="Récupère un article par son id",
     *  filters={
     *      {"name"="article", "dataType"="string"}
     *  },
     *    output= { "class"=Article::class, "collection"=false}
     * )
     */
    public function getArticleAction($id){
        //jms
        $serializer = SerializerBuilder::create()->build();
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository(Article::class)->find($id);
         if(empty($article))
        {
            return new JsonResponse(['message' => 'Article not found'], Response::HTTP_NOT_FOUND);
        }
        $data = $serializer->serialize($article, 'json');
        
        return new Response($data);
    }
    
    /**
     * @Route("/articles")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'un article",
     *  filters={
     *      {"name"="article", "dataType"="string"}
     *  },
     *    output= { "class"=Article::class, "collection"=false}
     * )
     */
    public function postArticleAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $jsonData = $request->getContent();
        //file_put_contents(__DIR__."/debug_tmp", var_export($jsonData, true));

        $article = $serializer->deserialize($jsonData, Article::class, 'json');
        
        $errors = $this->get("validator")->validate($article);
       
        if(count($errors) == 0){
            $em = $this->getDoctrine()->getManager();
            
            $category = $em->merge($article->getCategory());
            $article->setCategory($category);
      
            $brand = $em->merge($article->getBrand());
            $article->setBrand($brand);
            
            $shop = $em->merge($article->getShop());
            $article->setShop($shop);
            
            $materialsObject = $article->getMaterials();
            $materialsCollection = new ArrayCollection();
            foreach ($materialsObject as $key => $element) {
                $materialsCollection ->add($em->merge($element));
            }
            $article->setMaterials($materialsCollection);
            

            $colorsObject = $article->getColors();
            $colorsCollection = new ArrayCollection();
            foreach($colorsObject as $key => $element) { 
                $colorsCollection -> add($em->merge($element));
                
            }
            $article->setColors($colorsCollection);
            
            $em->persist($article);
            $em->flush();
       
            return new JsonResponse("OK POST");
        }  else {
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }
    
    /**
     * @Route("/articles/{id}", requirements={"id":"\d+"})  
     * @Method("PATCH")
     * @ApiDoc(
     *  description="Modification d'un article",
     *  filters={
     *      {"name"="article", "dataType"="string"}
     *  },
     *    output= { "class"=Article::class, "collection"=false}
     * )
     */
    public function patchArticleAction($id, Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        $em = $this->getDoctrine()->getManager();
        
        $jsonData = $request->getContent();
        //$jsonData = json_decode($request->getContent(), true);
//        dump($jsonData);
//        die();
        $article = new Article();
        $thisArticle = $serializer->deserialize($jsonData, Article::class, 'json');

        $errors = $this->get("validator")->validate($thisArticle);

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            
            $em->merge($thisArticle);
            //$em->persist($article);
            
            $em->flush();
            return new Response("OK PATCH");
        } else {
            $errors = $form->getErrors(true);
            foreach($errors as $key => $value){
                dump($value);
            }
            die();
            return new JsonResponse("ERROR-NOT-VALID");
        }
    }
    
    
    
    
}
