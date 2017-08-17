<?php

namespace Training\Test\App;

use Magento\Framework\App\RequestInterface;

class FrontController extends \Magento\Framework\App\FrontController
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @param \Magento\Framework\App\RouterList $routerList
     * @param \Magento\Framework\App\Response\Http $response
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\App\RouterList $routerList,
        \Magento\Framework\App\Response\Http $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::__construct($routerList, $response);
        $this->logger = $logger;
    }

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function dispatch(RequestInterface $request)
    {
        foreach ($this->_routerList as $router) {
            $this->logger->Debug(get_class($router));
        }
        return parent::dispatch($request);
    }

}