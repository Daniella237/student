<?php

namespace App\Form;

use App\Entity\Progression;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgressionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('duree')
            // ->add('number_printed')
            ->add('enseignants')
            ->add('matieres')
            ->add('seances')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Progression::class,
        ]);
    }
}
