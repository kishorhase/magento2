<?php
namespace Interview\Kishore\Controller;


class Router implements \Magento\Framework\App\RouterInterface
{
   
    protected $actionFactory;
    protected $_videoFactory;

    /**
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Interview\Kishore\Model\VideoFactory $videoFactory
     */
    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Interview\Kishore\Model\VideoFactory $videoFactory
    ) {
        $this->actionFactory = $actionFactory;
        $this->_videoFactory = $videoFactory;
    }

    /**
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $url_key = trim($request->getPathInfo(), '/video/');
        $url_key = rtrim($url_key, '/');
        $collection = $this->_videoFactory->create()->getCollection()
                    ->addFieldToFilter('url_key', $url_key);
        $video_id = null;
        if($collection->getSize()){
            $data = $collection->getFirstItem();
            $video_id = $data->getVideoId();
         }
        if (!$video_id) {
            return null;
        }else{

        $request->setModuleName('video')->setControllerName('index')->setActionName('view')->setParam('id', $video_id);
        $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $url_key);

        return $this->actionFactory->create('Magento\Framework\App\Action\Forward');
        }
    }
}
