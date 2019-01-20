<?php
namespace Interview\Kishore\Block\Video;

use Interview\Kishore\Api\Data\VideoInterface;
use Interview\Kishore\Model\ResourceModel\Video\Collection as VideoCollection;

class Index extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \Interview\Kishore\Model\ResourceModel\Video\CollectionFactory
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $_videoCollectionFactory;
    protected $_searchCriteriaBuilder;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Interview\Kishore\Api\VideoRepositoryInterface $postCollectionFactory
     * @param \Magento\Framework\Api\SearchCriteriaBuilder
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Interview\Kishore\Api\VideoRepositoryInterface  $videoCollectionFactory,
        \Magento\Framework\Api\SearchCriteriaBuilder  $searchCriteriaBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_videoCollectionFactory = $videoCollectionFactory;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
    * Get list of video
    * @return video collection
    */
    public function getVideoCollection()
    { 
        $searchCriteria = $this->_searchCriteriaBuilder->addFilter('status', 1,'eq')->create();
        $collection = $this->_videoCollectionFactory->getList($searchCriteria)->getItems();
        return $collection;
    }

}
