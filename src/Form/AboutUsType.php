<?php

namespace App\Form;

use App\Entity\AboutUs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AboutUsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mainTitle')
            ->add('mainDescription')
            ->add('sideTitle')
            ->add('sideDescription')
            ->add('vision')
            ->add('mission')
            ->add('founders')
            ->add('history')
            ->add('facebookLink')
            ->add('twitterLink')
            ->add('linkedin')
            ->add('team')
            ->add('services')
            ->add('logo')
            ->add('adImage1')
            ->add('adImage2')
            ->add('adImage3')
            ->add('phone')
            ->add('email')
            ->add('adres')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AboutUs::class,
        ]);
    }
}
