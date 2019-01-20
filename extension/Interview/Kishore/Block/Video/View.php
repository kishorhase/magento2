<?php
namespace Interview\Kishore\Block\Video;

use Interview\Kishore\Api\Data\VideoInterface;
use Interview\Kishore\Model\ResourceModel\Video\Collection as VideoCollection;

class View  extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \Interview\Kishore\Model\ResourceModel\Video\CollectionFactory
     */
    protected $_videoRepository;
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Interview\Kishore\Api\VideoRepositoryInterface $postCollectionFactory,
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Interview\Kishore\Api\VideoRepositoryInterface  $videoRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_videoRepository = $videoRepository;
    }

    public function getVideo()
    {

        $id = $this->getRequest()->getParam('id');
        return $this->_videoRepository->getById($id);     
    }


}
