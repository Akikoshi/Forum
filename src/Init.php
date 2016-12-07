<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 18:40
 */

namespace Semjasa\Heise;


use Semjasa\Heise\ContollerFactory\ControllerFactory;
use Semjasa\Heise\Exception\NotFoundException;
use Semjasa\Heise\Exception\RedirectException;
use Semjasa\Heise\Http\Request;

class Init
{  
    public function __construct()
    {
        try
        {
            $request = new Request($_SERVER['REQUEST_URI']);
            new ControllerFactory(__NAMESPACE__, $request);
            var_dump($request);
        }
        catch (RedirectException $e)
        {
            header("Location: " . $e->getUrl());
            exit;
        }
        catch (NotFoundException $e)
        {
            echo "Nicht gefunden - Ich bin eine ErrorPage!!!";
        }
        catch (\mysqli_sql_exception $e)
        {
            echo "MySQL Fehler: " . $e->getMessage();
            var_dump($e->getTraceAsString());
        }
    }
}