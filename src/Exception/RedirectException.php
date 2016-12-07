<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.12.2016
 * Time: 22:44
 */

namespace Semjasa\Heise\Exception;


class RedirectException extends ForumException
{
    /** @var string */
    protected $url = '/';

    /**
     * @var string
     */
    protected $statusCode = '302';

    /**
     * @param string $url
     */
    public function setRedirectUrl( string $url = '/' )
    {
        $this->url = $url;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode( int $statusCode = 302 )
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

}