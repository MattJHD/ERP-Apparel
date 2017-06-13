<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

/**
 * Description of ArticleSoldedRepository
 *
 * @author matthieudurand
 */
class ArticleSoldedRepository extends EntityRepository{
    /**
     * Recupere le nom, la date et le vendeur de chaque article vendu
     * 
     */
    public function getSales(){
        $qb = $this->_em->createQueryBuilder()
                ->select("article.name")
                ->addSelect("article_solded.soldAt")
                ->addSelect("user.firstname")
                ->from("AppBundle:Article", "article")
                ->join("AppBundle:Article_Solded", "article_solded", Expr\Join::WITH, "article.id = article_solded.article")
                ->join("AppBundle:User", 'user', Expr\Join::WITH, "user.id = article_solded.soldBy")
                ;
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }
    
    /**
     * Recupere le nom et la date de chaque article vendu le firstname du vendeur
     * 
     */
    public function getSalesByUser($user){
        $qb = $this->_em->createQueryBuilder()
                ->select("article.name")
                ->addSelect("article_solded.soldAt")
                ->from("AppBundle:Article", "article")
                ->join("AppBundle:Article_Solded", "article_solded", Expr\Join::WITH, "article.id = article_solded.article")
                ->join("AppBundle:User", 'user', Expr\Join::WITH, "user.id = article_solded.soldBy")
                ->andWhere("user.firstname = :user")
                ->setParameter("user", $user)
                ;
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }
    
    /**
     * Recupere le nombre de vente par vendeur
     * 
     */
    public function getCountSales($username){
        $qb = $this->_em->createQueryBuilder();
        $qb
            ->select($qb->expr()->count("aas.id"))
            ->from("AppBundle:Article_Solded", "aas")
            ->join("AppBundle:Article", "a", Expr\Join::WITH, "a.id = aas.article")
            ->join("AppBundle:User", "u", Expr\Join::WITH, "u.id = aas.soldBy")
            ->andWhere("u.username = :username")
            ->setParameter("username", $username)  
                ;
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }
    
    /**
     * Recupere le classement des meilleures ventes
     * 
     */
    public function getBestSales(){
        $qb = $this->_em->createQueryBuilder();
            $qb
            ->select("a.name")
            ->addSelect($qb->expr()->count("aas.id")." AS total")
            ->from("AppBundle:Article_Solded", "aas")
            ->join("AppBundle:Article", "a", Expr\Join::WITH, "a.id = aas.article")
            ->groupBy("a.name");
            $qb
            ->addOrderBy("total", "DESC")
                ;
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }
    

    
}
