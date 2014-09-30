<?php

namespace Vyper\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DiscoType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medium', 'entity', array(
                'class' => 'VyperSiteBundle:Medium',
                'property' => 'name',
            ))
            ->add('type', 'entity', array(
                'class' => 'VyperSiteBundle:DiscoType',
                'property' => 'name',
            ))
            ->add('country', 'entity', array(
                'class' => 'VyperSiteBundle:Country',
                'property' => 'name',
            ))
            ->add('continent', 'entity', array(
                'class' => 'VyperSiteBundle:Continent',
                'property' => 'name',
            ))
            ->add('title', 'text', array('attr' => array('placeholder' => 'Title')))
            ->add('titleReal', 'text', array('required' => false, 'attr' => array('placeholder' => 'Title Real')))
            ->add('cdJapan', 'text', array('required' => false, 'attr' => array('placeholder' => 'CDJapan')))
            ->add('itunes', 'text', array('required' => false, 'attr' => array('placeholder' => 'iTunes')))
            ->add('amazon', 'text', array('required' => false, 'attr' => array('placeholder' => 'Amazon')))
            ->add('date', 'date', array('widget' => 'single_text'))
            ->add('labelMusic', 'text', array('required' => false, 'attr' => array('placeholder' => 'Label')))
            ->add('details', 'textarea', array('required' => false))
            ->add('pictureID', 'text', array('required' => false, 'attr' => array('placeholder' => 'Picture ID')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vyper\SiteBundle\Entity\Disco'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vyper_sitebundle_disco';
    }
}
