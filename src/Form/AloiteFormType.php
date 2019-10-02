<?php

    namespace App\Form;

    use App\Entity\Aloitetaulu;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;

    use Symfony\Component\OptionsResolver\OptionsResolver;

    class AloiteFormType extends AbstractType{

        public function buildForm(FormBuilderInterface $builder, array $options){
            $builder
                ->add('Aihe', TextType::class, ['label' => 'Aihe'])
                ->add('Kuvaus', TextType::class, ['label' => 'Kuvaus'])
                ->add('Etunimi', TextType::class, ['label' => 'Etunimi'])
                ->add('Sukuniki', TextType::class, ['label' => 'Sukunimi'])
                ->add('Email', TextType::class, ['label' => 'Email'])
                ->add('Kirjauspaiva', DateType::class, ['label' => 'Päivämäärä'])
                ->add('save', SubmitType::class, [
                    'label' => 'Tallenna',
                    'attr' => ['class' => 'btn btn-info']
                ]);
        }

        public function configureOptions(OptionsResolver $resolver){
            $resolver->setDefaults([
                'data-class' => Aloitetaulu::class,
            ]);
        }
    }



?>
