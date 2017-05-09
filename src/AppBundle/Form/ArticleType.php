<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Entity\Article;

/**
 * Description of ArticleType
 *
 * @author matthieudurand
 */
class ArticleType extends AbstractType{
    public function buildform(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('name')
            ->add('price')
            ->add('size')
            ->add('categories')
            ->add('materials')
            ->add('colors')
            ->add('brands')
            ->add('shops')
            ->add('soldBy')
            ->add('soldAt')
            ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'csrf_protection' => false
        ]);
    }
}

 