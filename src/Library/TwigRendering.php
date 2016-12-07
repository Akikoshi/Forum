<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 19:31
 */

namespace Semjasa\Heise\Library;


use Semjasa\Heise\Configuration\TemplateConfiguration;

class TwigRendering
{
    private  $templatePath;

    public function __construct(string $template, array $variables)
    {
        $this->templatePath = TemplateConfiguration::getPath();
        $loader = new \Twig_Loader_Filesystem($this->templatePath);

        $twig = new \Twig_Environment($template);

        $template = $twig->loadTemplate($template);
        echo $template->render($variables);
    }
}