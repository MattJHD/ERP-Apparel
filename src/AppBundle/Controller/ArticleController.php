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
        
        //$jsonData = '{"id":"","name":"articleTest","price":100,"size":"S","categories":[{"id":"", "name":"categorieTest"}],"materials":[{"id":"", "name":"materialTestInsert"}],"colors":[{"id":"", "name":"color1"}],"brands":[{"id":"", "name":"brand1"}],"shops":[{"id":"", "name":"shop1", "localisation": "Marseille"}],"solded":1,"sold_by":"Toto","sold_at":"2014-11-30"}';
        $jsonData = $request->getContent();
        //file_put_contents(__DIR__."/debug_tmp", var_export($jsonData, true));

    
        
        $article = $serializer->deserialize($jsonData, Article::class, 'json');
//        dump($article);
//        die();
        
        $errors = $this->get("validator")->validate($article);
        //$form = $this->get('form.factory')->createNamed("",ArticleType::class, $article);
        //$form = $this->createForm(ArticleType::class, $article);
        
        //$form->submit($request);
        
//        dump($object);
//        die();
       
        if(count($errors) == 0){
            $em = $this->getDoctrine()->getManager();
            
            $category = $em->merge($article->getCategory());
            $article->setCategory($category);
            
            $brand = $em->merge($article->getBrand());
            $article->setBrand($brand);
            
            $shop = $em->merge($article->getShop());
            $article->setShop($shop);
            
            $materialsObject = $article->getMaterials();
            $materialsArray = $serializer->toArray($materialsObject);
            $materialsCollection = new ArrayCollection(array_merge($materialsArray));
            dump($materialsCollection);
            die();
            //$materials = $em->merge($materialsCollection);
            $article->setMaterials($materials);

            $colorsObject = $article->getColors();
            $colorsArray = $serializer->toArray($colorsObject);
            $colorsCollection = new ArrayCollection($colorsArray);
            $colors = $em->merge($colorsCollection);
            $article->setColors($colors);
            
            $em->persist($article);
            
            $em->flush();
       
            return new JsonResponse("OK POST");
        }  else {
            dump($errors);
            die();
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }
    
    /**
     * @Route("/articles/{id}")  
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
        
        $jsonData = $request->request->all();

        $thisArticle = $serializer->deserialize($jsonData, Article::class, 'json');

        
        $article = new Article();
        
        $form = $this->createForm(ArticleType::class, $thisArticle);

        $form->submit($request->request->all(), false);

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            
            $em->merge($thisArticle);
            $em->flush();
            return new Response("OK PATCH");
        } else {
            return $form;
        }
    }
    
    
    
    
}
