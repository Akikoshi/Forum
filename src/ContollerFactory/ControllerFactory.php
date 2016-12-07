<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 19:43
 */

namespace Semjasa\Heise\ContollerFactory;


use Semjasa\Heise\Http\Request;

/**
 * Class ControllerFactory
 * @package Semjasa\Heise\ContollerFactory
 */
class ControllerFactory
{
    /**
     * @var
     */
    private $namespace;

    /**
     * @var
     */
    private $request;

    /**
     * @var
     */
    private $controllerInstance;

    /**
     * @var
     */
    private $classPath;

    /**
     * @var
     */
    private $classWithNamespace;


    /**
     * ControllerFactory constructor.
     * @param $namespace
     * @param $request
     */
    public function __construct(string $namespace, Request $request)
    {
        $this->namespace = $namespace;
        $this->request = $request;
        $this->generateClassPath();
        $this->checkIfControllerExists();
        $this->generateClassNameWithNamespace();
        $this->loadController();
        $this->loadAction();
    }

    public function generateClassPath()
    {
        $this->classPath = __DIR__ . '/../Controllers/' . $this->request->getControllerName();
    }

    private function checkIfControllerExists()
    {
        if (! is_dir($this->classPath)){
            throw new NotFoundExeption("Action " . $this->request->getControllerName());
        }
    }
}