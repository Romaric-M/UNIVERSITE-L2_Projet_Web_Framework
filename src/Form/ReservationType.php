<?php

namespace App\Form;

use App\Entity\Horaire;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_reservation', TextType::class, ['label' => 'Votre nom de famille : '])
            ->add('prenom_reservation', TextType::class, ['label' => 'Votre prénom : '])
            ->add('date', DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
                'label' => 'Date de la réservation : '])
            ->add('heure', null, ['label' => 'Heure de réservation : '])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
