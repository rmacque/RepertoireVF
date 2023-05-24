<?php

namespace App\Form;

use App\Entity\Oeuvre;
use App\Entity\Categorie;
use App\Entity\Comedien;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OeuvreFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('parution')
            /*->add('photo', FileType::class, [
                'label' => 'Photo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File ([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application\pdf',
                            'application\x-pdf'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document'
                    ])
                ]
            ])*/
            ->add('categorie', EntityType::class, [
                'label' => 'appartenance',
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'multiple' => false,
                'expanded' => true
            ])
            ->add('listDa', EntityType::class, [
                'label' => 'Direction',
                'class' => Comedien::class,
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('c')
                        ->where('c.DA = 1')
                        ->orderBy('c.nom', 'ASC');
                },
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
        ]);
    }
}
