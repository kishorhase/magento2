<?php


namespace Interview\Kishore\Api\Data;

interface VideoInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const DESCRIPTION = 'description';
    const URL_KEY = 'url_key';
    const CREATED_AT = 'created_at';
    const URL_LINK = 'url_link';
    const VIDEO_ID = 'video_id';
    const STATUS = 'status';
    const TITLE = 'title';

    /**
     * Get video_id
     * @return string|null
     */
    public function getVideoId();

    /**
     * Set video_id
     * @param string $videoId
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setVideoId($videoId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setTitle($title);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Interview\Kishore\Api\Data\VideoExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Interview\Kishore\Api\Data\VideoExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Interview\Kishore\Api\Data\VideoExtensionInterface $extensionAttributes
    );

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setDescription($description);

    /**
     * Get url_key
     * @return string|null
     */
    public function getUrlKey();

    /**
     * Set url_key
     * @param string $urlKey
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setUrlKey($urlKey);

    /**
     * Get url_link
     * @return string|null
     */
    public function getUrlLink();

    /**
     * Set url_link
     * @param string $urlLink
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setUrlLink($urlLink);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setStatus($status);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setCreatedAt($createdAt);
}
