<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\BatteryLog;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

/**
 * Form to manage BatteryLog entity
 */
class BatteryLogForm extends AbstractType
{
    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Form\AbstractType::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('count', IntegerType::class)
            ->add('name');
    }

    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Form\AbstractType::configureOptions()
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BatteryLog::class,
        ]);
    }
}
