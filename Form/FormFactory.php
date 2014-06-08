<?php

namespace UEC\MediaBundle\Form;

use Symfony\Component\Form\FormFactoryInterface;
use UEC\MediaBundle\Model\MediaCommonInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;
use UEC\MediaBundle\Services\MediaService;
use UEC\MediaBundle\Services\ProviderService;
use UEC\MediaBundle\Form\FormFactoryInterface as MediaFormFactoryInterface;

class FormFactory implements MediaFormFactoryInterface
{
    /**
     * @var \UEC\MediaBundle\Services\ProviderService
     */
    protected $providerService;

    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @var \UEC\MediaBundle\Services\MediaService
     */
    protected $mediaService;

    function __construct(ProviderService $providerService, FormFactoryInterface $formFactory, MediaService $mediaService)
    {
        $this->providerService = $providerService;
        $this->formFactory = $formFactory;
        $this->mediaService = $mediaService;
    }

    /**
     * Get form name
     *
     * @param string|MediaCommonInterface $data
     * @return string
     */
    public function getFormName($data)
    {
        $context = $data;

        if ($data instanceof MediaCommonInterface) {
            if ($data instanceof MediaProviderInterface) {
                $context = $data->getMedia()->getContext();
            } else {
                $context = $data->getContext();
            }
        }

        return $this->providerService->getProviderManager($context)->getFormName();
    }

    /**
     * Get form by the context
     *
     * @param string $context
     * @param array $options
     * @return \Symfony\Component\Form\Form
     */
    public function getFormByContext($context, array $options = array())
    {
        $formName = $this->providerService->getProviderManager($context)->getFormName();
        $mediaProvider = $this->mediaService->create($context);

        return $this->getForm($formName, $mediaProvider, $options);
    }

    /**
     * Get form by mediaProvider
     *
     * @param MediaProviderInterface $mediaProvider
     * @param array $options
     * @return \Symfony\Component\Form\Form
     */
    public function getFormByMediaProvider(MediaProviderInterface $mediaProvider, array $options = array())
    {
        $formName = $this->providerService->getProviderManager($mediaProvider->getMedia()->getContext())->getFormName();
        return $this->getForm($formName, $mediaProvider, $options);
    }

    /**
     * Return the Form instance
     *
     * @param string $formName
     * @param MediaProviderInterface $mediaProvider
     * @param array $options
     * @return \Symfony\Component\Form\Form
     */
    protected function getForm($formName, MediaProviderInterface $mediaProvider, array $options = array())
    {
        return $this->formFactory->createBuilder($formName, $mediaProvider, $options)->getForm();
    }
}