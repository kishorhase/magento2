<?php


namespace Interview\Kishore\Model\Data;

use Interview\Kishore\Api\Data\VideoInterface;

class Video extends \Magento\Framework\Api\AbstractExtensibleObject implements VideoInterface
{

    /**
     * Get video_id
     * @return string|null
     */
    public function getVideoId()
    {
        return $this->_get(self::VIDEO_ID);
    }

    /**
     * Set video_id
     * @param string $videoId
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setVideoId($videoId)
    {
        return $this->setData(self::VIDEO_ID, $videoId);
    }

    /**
     * Get title
     * @return string|null
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Interview\Kishore\Api\Data\VideoExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Interview\Kishore\Api\Data\VideoExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Interview\Kishore\Api\Data\VideoExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get description
     * @return string|null
     */
    public function getDescription()
    {
        return $this->_get(self::DESCRIPTION);
    }

    /**
     * Set description
     * @param string $description
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get url_key
     * @return string|null
     */
    public function getUrlKey()
    {
        return $this->_get(self::URL_KEY);
    }

    /**
     * Set url_key
     * @param string $urlKey
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setUrlKey($urlKey)
    {
        return $this->setData(self::URL_KEY, $urlKey);
    }

    /**
     * Get url_link
     * @return string|null
     */
    public function getUrlLink()
    {
        return $this->_get(self::URL_LINK);
    }

    /**
     * Set url_link
     * @param string $urlLink
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setUrlLink($urlLink)
    {
        return $this->setData(self::URL_LINK, $urlLink);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Interview\Kishore\Api\Data\VideoInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
