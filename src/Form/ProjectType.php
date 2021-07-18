<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null,  [
                "label" => "Titre du projet",
            ])
            ->add('category', null,  [
                "label" => "Catégorie",
            ])
            ->add('deadline', DateType::class,[
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année', 
                ]
            ])
            ->add('client')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
