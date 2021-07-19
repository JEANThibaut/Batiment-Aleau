<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null,[
                "label"=>"Titre"
                ]) 
            // ->add('date')
            ->add('deadline', DateType::class,[
                "label"=>"Date de fin",
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année', 
                ]
            ])
            ->add('description')
            // ->add('state')
            // ->add('project')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
