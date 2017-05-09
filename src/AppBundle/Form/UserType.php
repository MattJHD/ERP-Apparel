<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Entity\User;

/**
 * Description of UserType
 *
 * @author williamBloch
 */
class UserType extends AbstractType{
    public function buildform(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('role')
            ->add('name')
            ->add('firstname')
            ->add('login')
            ->add('password')
            ->add('email')
            ->add('phone')
            ->add('function')
            ->add('date_creation')
            ->add('isactive')
            ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => false
        ]);
    }
}

 