<?php

namespace Vyper\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class MangaType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array('attr' => array('placeholder' => 'Title')))
            ->add('titleReal', 'text', array('required' => false, 'attr' => array('placeholder' => 'Title Real')))
            ->add('anime', 'checkbox', array('required' => false))
            ->add('tomeNumber', 'integer', array('required' => false, 'attr' => array('placeholder' => 'Title Real')))
            ->add('publicationDate', 'date', array('widget' => 'single_text'))
            ->add('pictureID', 'text', array('required' => false, 'attr' => array('placeholder' => 'Picture ID')))
        ;

        // On ajoute une fonction qui va écouter un évènement
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,    // 1er argument : L'évènement qui nous intéresse : ici, PRE_SET_DATA
            function(FormEvent $event) { // 2e argument : La fonction à exécuter lorsque l'évènement est déclenché
                // On récupère notre objet Advert sous-jacent
                $manga = $event->getData();

                // Cette condition est importante, on en reparle plus loin
                if (null === $manga) {
                    return; // On sort de la fonction sans rien faire lorsque $advert vaut null
                }
                if (null !== $manga->getId() && !is_null($manga->getPicture())) {

                    $event->getForm()->add('pictureID', 'text', array('data' => $manga->getPicture()->getId()));
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
            'data_class' => 'Vyper\SiteBundle\Entity\Manga'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vyper_sitebundle_manga';
    }
}
