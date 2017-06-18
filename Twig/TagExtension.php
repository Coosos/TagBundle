<?php

namespace Coosos\TagBundle\Twig;

use Symfony\Component\Form\FormView;

class TagExtension extends \Twig_Extension
{

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction("form_coosos_tag", [$this, 'tagRendering'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }

    /**
     * @param \Twig_Environment $environment
     * @param FormView          $formTag
     * @return string
     */
    public function tagRendering(\Twig_Environment $environment, FormView $formTag): string
    {
        return $environment->render("CoososTagBundle::formCoososTag.html.twig", ["formTag" => $formTag]);
    }
}
