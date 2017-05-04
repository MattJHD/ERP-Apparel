<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Article;

use JMS\Serializer\SerializerBuilder;

/**
 * Description of ArticleController
 *
 * @author matthieudurand
 */
class ArticleController extends Controller {
    
    public function indexAction(){
        
    }
    
    /**
     * @Route("/articles")
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
     * @Method("POST")
     */
    public function postArticleAction(){
        
        $article = new Article();
        
    }
}
