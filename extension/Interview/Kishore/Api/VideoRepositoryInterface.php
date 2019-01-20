<?php


namespace Interview\Kishore\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface VideoRepositoryInterface
{

    /**
     * Save Video
     * @param \Interview\Kishore\Api\Data\VideoInterface $video
     * @return \Interview\Kishore\Api\Data\VideoInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Interview\Kishore\Api\Data\VideoInterface $video
    );

    /**
     * Retrieve Video
     * @param string $videoId
     * @return \Interview\Kishore\Api\Data\VideoInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($videoId);

    /**
     * Retrieve Video matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Interview\Kishore\Api\Data\VideoSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Video
     * @param \Interview\Kishore\Api\Data\VideoInterface $video
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Interview\Kishore\Api\Data\VideoInterface $video
    );

    /**
     * Delete Video by ID
     * @param string $videoId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($videoId);
}
