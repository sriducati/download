<?php
namespace Download\View\Helper;
use Zend\View\Exception;
use Zend\View\Helper\AbstractHelper;


class BasePath extends AbstractHelper {
    protected $basePath = '';
    protected $project = 'download/';
    protected $isLocal = 'public';
    /**
     * 重写basePath 方法。
     * 
     * @param string $file            
     * @throws Exception\RuntimeException
     * @return string
     */
    public function __invoke($file = null) {
        
        if (null === $this->basePath) {
            throw new Exception\RuntimeException ( 'No base path provided' );
        }
        
        if (null !== $file) {
            $file = '/' . ltrim ( $file, '/' );
        }
        if ($file == '/local') {
            if (! empty ( $this->project )) {
                return $this->basePath . '/' . substr ( $this->project, 0, - 1 );
            } else {
                return $this->basePath . $this->project;
            }
        } else {
            if (defined ( 'RUNNING_FROM_ROOT' )) {
                return $this->basePath . '/' . $this->project . $this->isLocal . $file;
            } else {
                return $this->basePath . $file;
            }
        }
    }
    public function __construct() {
        switch (true) {
            case (isset ( $_SERVER ['HTTPS'] ) && ($_SERVER ['HTTPS'] == 'on' || $_SERVER ['HTTPS'] === true)) :
            case (isset ( $_SERVER ['HTTP_SCHEME'] ) && ($_SERVER ['HTTP_SCHEME'] == 'https')) :
            case (isset ( $_SERVER ['SERVER_PORT'] ) && ($_SERVER ['SERVER_PORT'] == 443)) :
                $scheme = 'https';
                break;
            default :
                $scheme = 'http';
        }
        $this->setScheme ( $scheme );
        
        if (isset ( $_SERVER ['HTTP_X_FORWARDED_HOST'] ) && ! empty ( $_SERVER ['HTTP_X_FORWARDED_HOST'] )) {
            $host = $_SERVER ['HTTP_X_FORWARDED_HOST'];
            if (strpos ( $host, ',' ) !== false) {
                $hosts = explode ( ',', $host );
                $host = trim ( array_pop ( $hosts ) );
            }
            $this->setHost ( $host );
        } elseif (isset ( $_SERVER ['HTTP_HOST'] ) && ! empty ( $_SERVER ['HTTP_HOST'] )) {
            $this->setHost ( $_SERVER ['HTTP_HOST'] );
        } elseif (isset ( $_SERVER ['SERVER_NAME'], $_SERVER ['SERVER_PORT'] )) {
            $name = $_SERVER ['SERVER_NAME'];
            $port = $_SERVER ['SERVER_PORT'];
            
            if (($scheme == 'http' && $port == 80) || ($scheme == 'https' && $port == 443)) {
                $this->setHost ( $name );
            } else {
                $this->setHost ( $name . ':' . $port );
            }
        }
        $this->basePath = $this->getScheme () . '://' . $this->getHost ();
    }
    public function setBasePath($basePath) {
        $this->basePath = rtrim ( $basePath, '/' );
        return $this;
    }
    
    /**
     * Returns host
     *
     * @return string host
     */
    public function getHost() {
        return $this->host;
    }
    
    /**
     * Sets host
     *
     * @param string $host
     *            new host
     * @return \Zend\View\Helper\ServerUrl fluent interface, returns self
     */
    public function setHost($host) {
        $this->host = $host;
        return $this;
    }
    
    /**
     * Returns scheme (typically http or https)
     *
     * @return string scheme (typically http or https)
     */
    public function getScheme() {
        return $this->scheme;
    }
    
    /**
     * Sets scheme (typically http or https)
     *
     * @param string $scheme
     *            new scheme (typically http or https)
     * @return \Zend\View\Helper\ServerUrl fluent interface, returns self
     */
    public function setScheme($scheme) {
        $this->scheme = $scheme;
        return $this;
    }
}