<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 19:43
 */

namespace Semjasa\Heise\ContollerFactory;


use Semjasa\Heise\Exception\NotFoundException;
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
    private $controllerInterface;

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

    /**
     * @return mixed
     */
    public function getControllerInstence()
    {
        return $this->controllerInterface;
    }

    /**
     *
     */
    public function generateClassPath()
    {
        $this->classPath =
            __DIR__ . '/../Controllers/'
            . $this->request->getControllerName();
    }

    /**
     * @throws NotFoundException
     */
    public function checkIfControllerExists()
    {
        if(! is_dir($this->classPath))
        {
            throw new NotFoundException("Action "
                . $this->request->getControllerName());
        }
    }

    /**
     *
     */
    public function generateClassNameWithNamespace()
    {
        $this->classWithNamespace =
            '\\' . $this->namespace . '\\Controllers\\'
            . $this->request->getControllerName() . '\\Controller';
    }

    /**
     *
     */
    public function loadController()
    {
        $this->controllerInterface = new $this->classWithNamespace(
            $this->request);
    }

    /**
     * @throws NotFoundException
     */
    private function loadAction()
    {
        $actionName = $this->request->getActionName();
        $actionName .= 'Action';
        $controllerClassName = get_class($this->controllerInterface);
        $methodList = get_class_methods($controllerClassName);

        if(in_array($actionName, $methodList))
        {
            $this->controllerInterface->$actionName();
            return;
        }
        throw new NotFoundException("Action " . $actionName);
    }
}