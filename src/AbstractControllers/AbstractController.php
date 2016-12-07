<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 19:30
 */

namespace Semjasa\Heise\AbstractControllers;


use Semjasa\Heise\Http\Request;
use Semjasa\Heise\Library\TwigRendering;

class AbstractController
{
    protected $request;

    protected $sesionService;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function indexAction()
    {
        new TwigRendering(
            'index.twig',[
                'controllerName'=>'Start',
                'actionName'=>'index'
            ]
        );
    }
}