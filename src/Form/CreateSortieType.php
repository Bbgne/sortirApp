<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Etat;
use App\Entity\Lieu;
use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('dateHeureDebut', DateType::class, ['html5' => true, 'widget' => 'single_text', 'label' => 'Date et heure de la sortie : '])
            ->add('dateLimiteInscription', DateType::class, ['html5' => true, 'widget' => 'single_text', 'label' => 'Date limite d\'inscription : '])
            ->add('nbInscriptionsMax', NumberType::class, ['label' => 'Nombre de places : '])
            ->add('duree', NumberType::class, ['label' => 'Durée'])
            ->add('infosSortie', TextareaType::class, ['label' => 'Description et infos : '])
            ->add('campus', EntityType::class, ['class' => Campus::class, 'choice_label' => 'nom', 'label' => 'Campus : '])
            ->add('lieu', EntityType::class, ['class' => Lieu::class, 'choice_label' => 'nom', 'label' => 'Lieu : ']);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
