<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qte')
            ->add('designation')
            ->add('total')
            ->add('remise')
            ->add('famille')
            ->add('marque')
            ->add('tva')
            ->add('codeart')
            ->add('date')
            ->add('totalTicket')
            ->add('recu')
            ->add('rendu')
            ->add('caissier')
            ->add('client')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
