<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 19:05
 */

namespace Semjasa\Heise\Http;


/**
 * Class Request
 * @package Semjasa\Heise\Http
 */
class Request
{
    /**
     * @var
     */
    private $requestUri;

    /**
     * @var
     */
    private $controllerName;

    /**
     * @var
     */
    private $actionName;

    /**
     * @var string
     */
    private $firstVar = '2';

    /**
     * @var string
     */
    private $secondVar = '';

    /**
     * Request constructor.
     * @param $requestUri
     */
    public function __construct($requestUri)
    {
        $this->requestUri = $requestUri;
        $this->cutUri();
    }

    /**
     * @return string
     */
    public function getControllerName() : string
    {
        return $this->controllerName;
    }

    /**
     * @return string
     */
    public function getActionName() : string
    {
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * @return string
     */
    public function getFirstVar()
    {
        return $this->firstVar;
    }

    /**
     * @return string
     */
    public function getSecondVar()
    {
        return $this->secondVar;
    }

    /**
     *
     */
    private function cutUri()
    {
        $controller = 'home';
        $action = 'index';

        $pattern = '/^\/([^\/|?]+)(\/([^\/|?]+))?(\/([^\/|?]+))?(\/([^\/|?]+))?/i';
        preg_match($pattern, $this->requestUri, $matches);
        
        if (! empty($matches[1])) $controller = $matches[1];
        if (! empty($matches[3])) $action = $matches[3];
        
        $this->controllerName = $this->convertUpperCaseFirst($controller);
        $this->actionName = strtolower($action);

        if(! empty($matches[5])) $this->firstVar = $matches[5];
        if(! empty($matches[7])) $this->secondVar = $matches[7];
    }

    /**
     * @param $string
     * @return string
     */
    private function convertUpperCaseFirst($string)
    {
        $string = strtolower($string);
        $string = ucfirst($string);
        return $string;
    }
}