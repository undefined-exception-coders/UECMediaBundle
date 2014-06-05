<?php

namespace UEC\MediaBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;

interface FormFactoryInterface
{
    /**
     * Get form by the context
     *
     * @param string $context
     * @param array $options
     * @return \Symfony\Component\Form\Form
     */
    public function getFormByContext($context, array $options = array());

    /**
     * Get form by mediaProvider
     *
     * @param MediaProviderInterface $mediaProvider
     * @return \Symfony\Component\Form\Form
     */
    public function getFormByMediaProvider(MediaProviderInterface $mediaProvider);
}