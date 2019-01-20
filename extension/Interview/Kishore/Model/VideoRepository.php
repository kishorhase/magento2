<?php


namespace Interview\Kishore\Model;

use Interview\Kishore\Api\VideoRepositoryInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Interview\Kishore\Model\ResourceModel\Video as ResourceVideo;
use Interview\Kishore\Api\Data\VideoSearchResultsInterfaceFactory;
use Interview\Kishore\Api\Data\VideoInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Interview\Kishore\Model\ResourceModel\Video\CollectionFactory as VideoCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

class VideoRepository implements VideoRepositoryInterface
{

    protected $resource;

    protected $searchResultsFactory;

    private $storeManager;

    protected $extensionAttributesJoinProcessor;

    protected $dataObjectHelper;

    private $collectionProcessor;

    protected $videoFactory;

    protected $videoCollectionFactory;

    protected $dataObjectProcessor;

    protected $dataVideoFactory;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceVideo $resource
     * @param VideoFactory $videoFactory
     * @param VideoInterfaceFactory $dataVideoFactory
     * @param VideoCollectionFactory $videoCollectionFactory
     * @param VideoSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceVideo $resource,
        VideoFactory $videoFactory,
        VideoInterfaceFactory $dataVideoFactory,
        VideoCollectionFactory $videoCollectionFactory,
        VideoSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->videoFactory = $videoFactory;
        $this->videoCollectionFactory = $videoCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataVideoFactory = $dataVideoFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Interview\Kishore\Api\Data\VideoInterface $video
    ) {
        /* if (empty($video->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $video->setStoreId($storeId);
        } */
        
        $videoData = $this->extensibleDataObjectConverter->toNestedArray(
            $video,
            [],
            \Interview\Kishore\Api\Data\VideoInterface::class
        );
        
        $videoModel = $this->videoFactory->create()->setData($videoData);
        
        try {
            $this->resource->save($videoModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the video: %1',
                $exception->getMessage()
            ));
        }
        return $videoModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($videoId)
    {
        $video = $this->videoFactory->create();
        $this->resource->load($video, $videoId);
        if (!$video->getId()) {
            throw new NoSuchEntityException(__('Video with id "%1" does not exist.', $videoId));
        }
        return $video->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->videoCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Interview\Kishore\Api\Data\VideoInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Interview\Kishore\Api\Data\VideoInterface $video
    ) {
        try {
            $videoModel = $this->videoFactory->create();
            $this->resource->load($videoModel, $video->getVideoId());
            $this->resource->delete($videoModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Video: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($videoId)
    {
        return $this->delete($this->getById($videoId));
    }
}
