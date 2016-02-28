<?php

namespace UEC\MediaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaFormType extends AbstractType
{
    /**
     * @var string
     */
    protected $modelClass;

    function __construct($modelClass)
    {
        $this->modelClass = $modelClass;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->modelClass,
        ));
    }

    public function getName()
    {
        return 'uec_media_form';
    }
} 