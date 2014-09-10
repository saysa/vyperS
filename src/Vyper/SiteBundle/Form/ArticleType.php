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
            ->add('title', 'text', array('attr' => array('placeholder' => 'Title')))
            ->add('description', 'textarea', array('attr' => array('placeholder' => 'Description')))
            ->add('text', 'textarea')
            ->add('releaseDate', 'text')
            ->add('releaseTime', 'text')
            ->add('author', 'text', array('attr' => array('placeholder' => 'Author')))
            ->add('translator', 'text', array('required' => false, 'attr' => array('placeholder' => 'Translator')))
            ->add('source', 'text', array('required' => false, 'attr' => array('placeholder' => 'Source')))
            ->add('sourceURL', 'text', array('required' => false, 'attr' => array('placeholder' => 'Source URL')))
            ->add('metaKeywords', 'text', array('required' => false, 'attr' => array('placeholder' => 'META keywords separate with coma')))
            ->add('youtube', 'text', array('required' => false, 'attr' => array('placeholder' => 'ID Youtube')))
            ->add('articleType', 'entity', array(
                'class' => 'VyperSiteBundle:ArticleType',
                'property' => 'name',
            ))
            ->add('continent', 'entity', array(
                'class' => 'VyperSiteBundle:Continent',
                'property' => 'name',
            ))
            ->add('theme', 'entity', array(
                'required' => false,
                'class' => 'VyperSiteBundle:Theme',
                'property' => 'title',
                'multiple' => true,
            ))
        ->add('pictureID', 'text', array('attr' => array('placeholder' => 'Picture ID')))
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
