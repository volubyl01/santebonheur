<?php

namespace App\Form;

use App\Entity\Product;
use Doctrine\DBAL\Types\FloatType;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class Product1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, array('label' => 'Nom'))
            ->add('description', TextareaType::class)
            ->add('category', ChoiceType::class, [
                'label' => 'Catégorie',
                'choices'  => [
                    'Peau' => "peau",
                    'Cheveux' => "cheveux",
                    'Pieds' => "pieds",
                ],
            ])
            ->add('price', NumberType::class, array('label' => 'Prix'))
            ->add('quantity', NumberType::class, array('label' => 'Quantité'))
            ->add('origin', TextType::class, array('label' => 'Origine'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
