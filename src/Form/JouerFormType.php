<?php

namespace App\Form;

use App\Entity\Jouer;
use App\Entity\Oeuvre;
use App\Entity\Comedien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class JouerFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('role')
            ->add('VF')
            ->add('VO')
            /*
            ->add('oeuvre', EntityType::class, [
                'class' => Oeuvre::class,
                'label' => 'Comedien :',
            ])
            ->add('comedien', EntityType::class, [
                'class' => Comedien::class,
                'label' => 'Comedien :',
            ])
            */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JouerFormType::class,
        ]);
    }
}
