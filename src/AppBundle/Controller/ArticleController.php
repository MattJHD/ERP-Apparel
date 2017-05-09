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
     *  description="Récupère la liste d'un article par son id",
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
        
        $jsonData = '{"id":"","name":"articleTestPost","price":66,"size":"XS","categories":[{"id":"", "name":"categorieTesttreee"}],"materials":[{"id":"", "name":"materialTestInsert"}],"colors":[{"id":"", "name":"colorTestInsert"}],"brands":[{"id":"", "name":"brandTesttreee"}],"shops":[{"id":"", "name":"shopTesttreee", "localisation": "Strasbourg"}],"solded":false,"sold_by":"Marco","sold_at":"2014-11-30"}';
        
        $object = $serializer->deserialize($jsonData, Article::class, 'json');
        
        $article = new Article();
        
        $form = $this->createForm(ArticleType::class, $article);
        
        $form->submit($request->request->all());
        
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            
            return new Response("OK POST");
        }else{
            return $form;
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
        
        $jsonData = '{"id":"13","name":"articleTreize","price":"150","size":"XL","categories":[],"materials":[],"colors":[],"brands":[],"shops":[],"solded":false,"sold_by":"Marco","sold_at":"2016-11-30"}';
        
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
