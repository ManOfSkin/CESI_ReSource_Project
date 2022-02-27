<?php

namespace App\Form;

use App\Entity\Ressource;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
/* use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
 */

class RessourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre_article')
            /* ->add('article')
            ->add('citoyen_modification')
            ->add('validation_administrateur')
            ->add('attribut_media') */
            ->add('categorie')
            ->add('type_relation')
            ->add('type_ressource')
            ->add('ajouter', SubmitType::class)
            ->add('annuler', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ressource::class,
        ]);
    }
}
