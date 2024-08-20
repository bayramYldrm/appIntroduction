<?php

namespace App\Form;

use App\Entity\ContactUs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactUsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', null, [
                'label' => 'Adınız',
            ])
            ->add('lastname', null, [
                'label' => 'Soyadınız',
            ])
            ->add('email', null, [
                'label' => 'Email Adresiniz',
            ])
            ->add('city', null, [
                'label' => 'Şehir',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactUs::class,
        ]);
    }
}
