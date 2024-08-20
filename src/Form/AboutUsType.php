<?php

namespace App\Form;

use App\Entity\AboutUs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AboutUsType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
$builder
->add('mainTitle', TextType::class, [
'label' => 'Ana Başlık',
'attr' => ['maxlength' => 100]
])
->add('mainDescription', TextareaType::class, [
'label' => 'Ana Açıklama',
'attr' => ['maxlength' => 255]
])
->add('sideTitle', TextType::class, [
'label' => 'Yan Başlık',
'attr' => ['maxlength' => 100]
])
->add('sideDescription', TextareaType::class, [
'label' => 'Yan Açıklama',
'attr' => ['maxlength' => 255]
])
->add('vision', TextType::class, [
'label' => 'Vizyon',
'attr' => ['maxlength' => 255]
])
->add('mission', TextType::class, [
'label' => 'Misyon',
'attr' => ['maxlength' => 255]
])
->add('founders', TextType::class, [
'label' => 'Kurucular',
'attr' => ['maxlength' => 255]
])
->add('history', TextType::class, [
'label' => 'Tarihçe',
'attr' => ['maxlength' => 255]
])
->add('facebookLink', UrlType::class, [
'label' => 'Facebook Bağlantısı',
'attr' => ['maxlength' => 255]
])
->add('twitterLink', UrlType::class, [
'label' => 'Twitter Bağlantısı',
'attr' => ['maxlength' => 255]
])
->add('linkedin', UrlType::class, [
'label' => 'LinkedIn Bağlantısı',
'attr' => ['maxlength' => 255]
])
->add('team', TextType::class, [
'label' => 'Takım',
'attr' => ['maxlength' => 255]
])
->add('services', TextareaType::class, [
'label' => 'Hizmetler'
])
->add('logo', FileType::class, [
'label' => 'Logo',
'mapped' => false,
'required' => false,
'attr' => ['accept' => 'image/*']
])
->add('adImage1', FileType::class, [
'label' => 'Reklam Resmi 1',
'mapped' => false,
'required' => false,
'attr' => ['accept' => 'image/*']
])
->add('adImage2', FileType::class, [
'label' => 'Reklam Resmi 2',
'mapped' => false,
'required' => false,
'attr' => ['accept' => 'image/*']
])
->add('adImage3', FileType::class, [
'label' => 'Reklam Resmi 3',
'mapped' => false,
'required' => false,
'attr' => ['accept' => 'image/*']
])
->add('phone', TelType::class, [
'label' => 'Telefon',
'attr' => ['maxlength' => 20]
])
->add('email', EmailType::class, [
'label' => 'E-posta',
'attr' => ['maxlength' => 255]
])
->add('adres', TextType::class, [
'label' => 'Adres',
'attr' => ['maxlength' => 255]
]);
}

public function configureOptions(OptionsResolver $resolver): void
{
$resolver->setDefaults([
'data_class' => AboutUs::class,
]);
}
}
