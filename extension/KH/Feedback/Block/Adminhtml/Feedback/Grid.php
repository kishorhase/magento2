<?php

namespace KH\Feedback\Block\Adminhtml\Feedback;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended {

    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \KH\Feedback\Model\feedbackFactory
     */
    protected $_feedbackFactory;

    /**
     * @var \KH\Feedback\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \KH\Feedback\Model\feedbackFactory $feedbackFactory
     * @param \KH\Feedback\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
    \Magento\Backend\Block\Template\Context $context, \Magento\Backend\Helper\Data $backendHelper, \KH\Feedback\Model\FeedbackFactory $FeedbackFactory, \KH\Feedback\Model\Status $status, \Magento\Framework\Module\Manager $moduleManager, array $data = []
    ) {
        $this->_feedbackFactory = $FeedbackFactory;
        $this->_status = $status;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct() {
        parent::_construct();
        $this->setId('postGrid');
        $this->setDefaultSort('feedback_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
        $this->setVarNameFilter('post_filter');
    }

    /**
     * @return $this
     */
    protected function _prepareCollection() {
        $collection = $this->_feedbackFactory->create()->getCollection();
        $this->setCollection($collection);

        parent::_prepareCollection();

        return $this;
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns() {
        $this->addColumn(
                'feedback_id', [
            'header' => __('ID'),
            'type' => 'number',
            'index' => 'feedback_id',
            'header_css_class' => 'col-id',
            'column_css_class' => 'col-id'
                ]
        );



        $this->addColumn(
                'name', [
            'header' => __('Name'),
            'index' => 'name',
                ]
        );

        $this->addColumn(
                'email', [
            'header' => __('Email'),
            'index' => 'email',
                ]
        );

        $this->addColumn(
                'mobile', [
            'header' => __('Mobile'),
            'index' => 'mobile',
                ]
        );

        $this->addColumn(
                'content', [
            'header' => __('Content'),
            'index' => 'content',
                ]
        );



        $this->addColumn(
                'edit', [
            'header' => __('Edit'),
            'type' => 'action',
            'getter' => 'getId',
            'actions' => [
                [
                    'caption' => __('Edit'),
                    'url' => [
                        'base' => '*/*/edit'
                    ],
                    'field' => 'feedback_id'
                ]
            ],
            'filter' => false,
            'sortable' => false,
            'index' => 'stores',
            'header_css_class' => 'col-action',
            'column_css_class' => 'col-action'
                ]
        );



        $this->addExportType($this->getUrl('feedback/*/exportCsv', ['_current' => true]), __('CSV'));
        $this->addExportType($this->getUrl('feedback/*/exportExcel', ['_current' => true]), __('Excel XML'));

        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }

        return parent::_prepareColumns();
    }

    /**
     * @return $this
     */
    protected function _prepareMassaction() {

        $this->setMassactionIdField('feedback_id');
        //$this->getMassactionBlock()->setTemplate('KH_Feedback::feedback/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('feedback');

        $this->getMassactionBlock()->addItem(
                'delete', [
            'label' => __('Delete'),
            'url' => $this->getUrl('feedback/*/massDelete'),
            'confirm' => __('Are you sure?')
                ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
                'status', [
            'label' => __('Change status'),
            'url' => $this->getUrl('feedback/*/massStatus', ['_current' => true]),
            'additional' => [
                'visibility' => [
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => __('Status'),
                    'values' => $statuses
                ]
            ]
                ]
        );


        return $this;
    }

    /**
     * @return string
     */
    public function getGridUrl() {
        return $this->getUrl('feedback/*/index', ['_current' => true]);
    }

    /**
     * @param \KH\Feedback\Model\feedback|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row) {

        return $this->getUrl(
                        'feedback/*/edit', ['feedback_id' => $row->getId()]
        );
    }

}
