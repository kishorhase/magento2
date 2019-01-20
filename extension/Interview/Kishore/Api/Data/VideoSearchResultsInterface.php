<?php


namespace Interview\Kishore\Api\Data;

interface VideoSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Video list.
     * @return \Interview\Kishore\Api\Data\VideoInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \Interview\Kishore\Api\Data\VideoInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
