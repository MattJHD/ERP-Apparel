<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Entity\Group;

/**
 * Description of GroupType
 *
 * @author williamBloch
 */
class GroupType extends AbstractType{
    public function buildform(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('name')
            ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Group::class,
            'csrf_protection' => false
        ]);
    }
}

 