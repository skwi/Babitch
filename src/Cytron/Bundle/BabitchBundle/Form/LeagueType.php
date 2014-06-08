<?php

namespace Cytron\Bundle\BabitchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Cytron\Bundle\BabitchBundle\Entity\League;

/**
 * PlayerType Form class
 */
class LeagueType extends AbstractType
{
    /**
     * Configures an Player form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('gamelle_rule', 'choice', array(
                'choices' => array(League::getAllowedGamelleRules())
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cytron\Bundle\BabitchBundle\Entity\League',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'league';
    }
}
