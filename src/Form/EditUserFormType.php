<?php

namespace App\Form;

use App\Entity\User;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class EditUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('PUT')
            ->add('email', EmailType::class)
            ->add('username', TextType::class, [
                'constraints' => [ new NotBlank(['message' => 'Please enter a username'])]
            ])
//            ->add('active', ChoiceType::class, [
//                'choices' => ['Active' => true, 'Desactivated' => false],
//            ])
//            ->add('roles', ChoiceType::class, [
//                'choices' => ['User' => 'ROLE_USER', 'Admin' => 'ROLE_ADMIN'],
//            ])
            ->add('Update', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
