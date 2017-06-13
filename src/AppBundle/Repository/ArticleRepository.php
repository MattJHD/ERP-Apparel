<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
/**
 * Description of ArticleRepository
 *
 * @author mdurand
 */
class ArticleRepository extends EntityRepository
{
    public function countArticleQuantity($id){
        $qb = $this->_em->createQueryBuilder()
                ->select("article.quantity")
                ->from("AppBundle:Article", "article")
                ->andWhere("article.id = :id")
                ->setParameter("id", $id);
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }
    
    public function decrementQuantityArticle($value, $id){
        $qb = $this->_em->createQueryBuilder()
                ->update('AppBundle:Article', 'a')
                ->set('a.quantity', ':value')
                ->setParameter('value', $value)
                ->andWhere('a.id = :id')
                ->setParameter("id", $id);
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }
}
