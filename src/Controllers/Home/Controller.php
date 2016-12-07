<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 22:11
 */

namespace Semjasa\Heise\Controllers\Home;


use Semjasa\Heise\AbstractControllers\AbstractController;
use Semjasa\Heise\Library\TwigRendering;

class Controller extends AbstractController
{
    public function indexAction()
    {
        new TwigRendering(
            'Home/index.twig',
            [
                'controllerName'=>'Home',
                'action'=>'index'
            ]
        );
    }
}