<?php


namespace Interview\Kishore\Model;

use Interview\Kishore\Api\Data\VideoInterfaceFactory;
use Interview\Kishore\Api\Data\VideoInterface;
use Magento\Framework\Api\DataObjectHelper;

class Video extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'interview_kishore_video';
    protected $videoDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param VideoInterfaceFactory $videoDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Interview\Kishore\Model\ResourceModel\Video $resource
     * @param \Interview\Kishore\Model\ResourceModel\Video\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        VideoInterfaceFactory $videoDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Interview\Kishore\Model\ResourceModel\Video $resource,
        \Interview\Kishore\Model\ResourceModel\Video\Collection $resourceCollection,
        array $data = []
    ) {
        $this->videoDataFactory = $videoDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve video model with video data
     * @return VideoInterface
     */
    public function getDataModel()
    {
        $videoData = $this->getData();
        
        $videoDataObject = $this->videoDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $videoDataObject,
            $videoData,
            VideoInterface::class
        );
        
        return $videoDataObject;
    }
}
