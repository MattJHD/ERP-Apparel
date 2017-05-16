<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
//use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Category;
use AppBundle\Entity\Material;
use AppBundle\Entity\Color;
use AppBundle\Entity\Brand;
use AppBundle\Entity\Shop;

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
            ->add('name', TextType::class)
            ->add('price', IntegerType::class)
            ->add('size', TextType::class)
            ->add('category', EntityType::class, [
                'class' => Category::class,
            ])
            ->add('materials', EntityType::class, [
                'class' => Material::class,
            ])
            ->add('colors', EntityType::class, [
                'class' => Color::class,
            ])
            ->add('brand', EntityType::class, [
                'class' => Brand::class,
            ])
            ->add('shop', EntityType::class, [
                'class' => Shop::class,
            ])
            ->add('solded')
            ->add('sold_by', TextType::class)
            ->add('sold_at', DateType::class)
            ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'csrf_protection' => false,
            'allow_extra_fields' => false,
        ]);
    }
}

 