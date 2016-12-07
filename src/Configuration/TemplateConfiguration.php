<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 19:01
 */

namespace Semjasa\Heise\Configuration;


final class TemplateConfiguration
{
    /**
     * @return string
     */
    public static function getPath(){
        return __DIR__ . ("/../../template");
    }
}