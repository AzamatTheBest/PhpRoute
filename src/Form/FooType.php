<?php

namespace App\Form;


use App\Entity\Foo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FooType extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $options)
    {
        $formBuilder
            ->add('bar', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Type bar..',
                ],
            ])
            ->add('price', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Type price..',
                ],
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolser)
    {
        $resolser
            ->setDefaults([
                'data_class' => Foo::class,
            ])
        ;
    }
}