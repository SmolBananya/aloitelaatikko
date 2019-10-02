<?php

namespace App\Form;

use App\Entity\Yhteystieto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YhteystietoFormType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('nimi', TextType::class, ['label' => 'Etu- ja sukunimi']) 
            ->add('email', EmailType::class, ['label' => 'Sähköpostiosoite'])
            ->add('kommentti', TextType::class, ['label' => 'Kommentti'])
            ->add('save', SubmitType::class, [
                'label' => 'Talleta',
                'attr'  => ['class' => 'btn btn-info']
                ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data-class' => Yhteystieto::class,
        ]);
    }

}
?>