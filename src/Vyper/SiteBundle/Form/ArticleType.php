<?php

namespace Vyper\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('highlight', 'checkbox', array('required' => false))
            ->add('title', 'text')
            ->add('description', 'textarea')
            ->add('text', 'textarea')
            ->add('releaseDate', 'date')
            ->add('releaseTime', 'time')
            ->add('author', 'text')
            ->add('translator', 'text')
            ->add('source', 'text')
            ->add('sourceURL', 'text')
            ->add('metaKeywords', 'text')
            ->add('youtube', 'text')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vyper\SiteBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vyper_sitebundle_article';
    }
}
