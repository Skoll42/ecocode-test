<?php

namespace App\Form\User;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'locale',
                ChoiceType::class,
                [
                    'required' => true,
                    'choices'  => $this->getLocaleChoices(),
                ]
            )
            ->add(
                'title',
                ChoiceType::class,
                [
                    'required' => true,
                    'choices'  => $this->getTitleChoices(),
                ]
            )
            ->add(
                'name',
                TextType::class,
                [
                    'required'  => true,
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'required' => true,
                ]
            )
            ->add(
                'plainPassword',
                RepeatedType::class,
                [
                    'type'            => PasswordType::class,
                    'invalid_message' => 'Passwords must match',
                    'options'         => ['attr' => ['class' => 'password-field']],
                    'required'        => true,
                    'first_options'   => ['label' => 'Password'],
                    'second_options'  => ['label' => 'Password Repeat'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            'max' => 255,
                        ]),
                    ],
                ]
            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => User::class,
                'locale'     => 'en',
                'title'      => 'mr'
            ]
        );
    }

    private function getTitleChoices()
    {
        return [
            'Mr'  => User::TITLE_MR,
            'Mrs' => User::TITLE_MRS,
            'Ms'  => User::TITLE_MS,
        ];
    }

    private function getLocaleChoices()
    {
        return [
            'English' => User::LOCALE_EN,
            'Deutsch' => User::LOCALE_DE,
        ];
    }
}
