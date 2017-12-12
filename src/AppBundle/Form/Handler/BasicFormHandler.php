<?php

namespace AppBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;

/**
 * Basic handler to process form submit
 */
class BasicFormHandler
{
    /**
     * Handle form submision and return converted entity
     *
     * @param FormInterface $form
     * @param Request $request
     * @return mixed|boolean
     */
    public function handle(FormInterface $form, Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                return $form->getData();
            }
        }

        return false;
    }
}
