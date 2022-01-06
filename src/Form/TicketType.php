<?php

namespace App\Form;

use App\Entity\Tickets;
use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;


class TicketType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;


    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


                $em=$this->entityManager;
                $repository=$em->getRepository(Address::class);
                $builder
                    ->add('name',TextType::class, ['label' => 'Ваше имя:'])
                    ->add('phone',TelType::class, ['label' => 'Мобильный телефон:'])
                    //->add('address',ChoiceType::class,['label' => 'Адрес:', 'choices' =>$repository->GetnameChoice() ])
                    ->add('a_choice',ChoiceType::class,['label' => 'Адрес:', 'choices' =>$options['address_choice'],'mapped' => false ])

                    ->add('message',CKEditorType::class, ['config' => ['toolbar' => 'basic','required' => true],'label' => 'Создать заявку о технической проблеме:'])
                    ->add('save', SubmitType::class, ['label' => 'Отправить заявку']);

        }



        /*
       $em=$options['entity_manager'];
        $repository=$em->getRepository(Address::class);
        $builder
            ->add('name',TextType::class, ['label' => 'Ваше имя:'])
            ->add('phone',TelType::class, ['label' => 'Мобильный телефон:'])
            ->add('message',CKEditorType::class, ['config' => ['toolbar' => 'basic','required' => true],'label' => 'Сообщение:'])
            ->add('address',ChoiceType::class,['label' => 'Адрес:',
                'choices' =>$repository->GetnameChoice() ])
            ->add('save', SubmitType::class, ['label' => 'Отправить заявку'])
        ;
    */


    public function getBlockPrefix() {
        return 'createTicket';
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           // 'data_class' => Tickets::class,
          //  'a_choice' => [],
            'address_choice' =>[],

       ]);
        $resolver->setAllowedTypes('address_choice', 'array');
        #$resolver->setRequired('entity_manager');
       // $resolver->setAllowedValues('a_choice',[]);
    }
}

