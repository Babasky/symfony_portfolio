<?php

namespace App\Form;

use App\Entity\Contact;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname', TextType::class, [
                'row_attr' => [
                    'class' => 'mb-6',
                ],
                'label' => 'Enter your full name',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'placeholder' => 'Enter your full name',
                    'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500',
                ],
            ])
            ->add('email', EmailType::class, [
                'row_attr' => [
                    'class' => 'mb-6',
                ],
                'label' => 'Enter your email',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'placeholder' => 'Enter your email',
                    'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500',
                ],
            ])
            ->add('subject', TextType::class, [
                'row_attr' => [
                    'class' => 'mb-6',
                ],
                'label' => 'Enter your subject',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'placeholder' => 'Enter your subject',
                    'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500',
                ],
            ])
            ->add('message', TextareaType::class, [
                'row_attr' => [
                    'class' => 'mb-6',
                ],
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-2',
                ],
                'label' => 'Enter your message',
                'attr' => [
                    'id' => 'message',
                    'placeholder' => 'Enter your message',
                    'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500',
                    'rows' => 5,
                ],
            ])

            ->add('captcha', Recaptcha3Type::class,[
                'constraints' => new Recaptcha3()
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'label' => false,
        ]);
    }
}
