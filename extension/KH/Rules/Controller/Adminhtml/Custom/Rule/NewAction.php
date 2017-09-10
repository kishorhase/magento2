<?php

namespace KH\Rules\Controller\Adminhtml\Custom\Rule;

class NewAction extends \KH\Rules\Controller\Adminhtml\Custom\Rule
{
    /**
     * New action
     *
     * @return void
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}