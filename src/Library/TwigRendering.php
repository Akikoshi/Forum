<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 19:31
 */

namespace Semjasa\Heise\Library;


use Semjasa\Heise\Configuration\TemplateConfiguration;

/**
 * Class TwigRendering
 * @package Semjasa\Heise\Library
 */
class TwigRendering
{
    /**
     * @var string
     */
    private  $templatePath;

    /**
     * TwigRendering constructor.
     * @param string $template
     * @param array $variables
     */
    public function __construct(string $template, array $variables)
    {
        $this->templatePath = TemplateConfiguration::getPath();
        $loader = new \Twig_Loader_Filesystem($this->templatePath);

        $twig = new \Twig_Environment($loader, array());

        $template = $twig->loadTemplate($template);
        echo $template->render($variables);
    }
}