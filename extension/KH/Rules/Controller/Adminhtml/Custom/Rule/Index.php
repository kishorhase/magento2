<?php

namespace KH\Rules\Controller\Adminhtml\Custom\Rule;

class Index extends \KH\Rules\Controller\Adminhtml\Custom\Rule
{
    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        $this->_initAction()->_addBreadcrumb(__('Custom Rules'), __('Custom Rules'));
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Custom Rules'));
        $this->_view->renderLayout('root');
    }
}