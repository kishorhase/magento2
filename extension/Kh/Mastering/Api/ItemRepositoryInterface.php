<?php

namespace Kh\Mastering\Api;
interface ItemRepositoryInterface
{
    /**
     * @return \Kh\Mastering\Api\Data\ItemInterface[]
     */
    public function getList();
}