<?php

namespace Vyper\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ArtistType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('attr' => array('placeholder' => 'Name')))
            ->add('realName', 'text', array('attr' => array('placeholder' => 'Real Name')))
            ->add('profile', 'textarea')
            ->add('biography', 'textarea')
            ->add('author', 'text', array('attr' => array('placeholder' => 'Author')))
            ->add('translator', 'text', array('attr' => array('placeholder' => 'Translator')))
            ->add('keywords', 'text', array('attr' => array('placeholder' => 'Keywords')))
            ->add('pictureID', 'text', array('required' => false, 'attr' => array('placeholder' => 'Picture ID')))
        ;

        // On ajoute une fonction qui va écouter un évènement
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,    // 1er argument : L'évènement qui nous intéresse : ici, PRE_SET_DATA
            function(FormEvent $event) { // 2e argument : La fonction à exécuter lorsque l'évènement est déclenché
                // On récupère notre objet Advert sous-jacent
                $artist = $event->getData();

                // Cette condition est importante, on en reparle plus loin
                if (null === $artist) {
                    return; // On sort de la fonction sans rien faire lorsque $advert vaut null
                }
                if (null !== $artist->getId() && !is_null($artist->getPicture())) {

                    $event->getForm()->add('pictureID', 'text', array('data' => $artist->getPicture()->getId()));
                }
            }
        );
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vyper\SiteBundle\Entity\Artist'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vyper_sitebundle_artist';
    }
}