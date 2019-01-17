<?php
namespace Kh\Switcher\Block;

use \Magento\Framework\View\Element\Template\Context;
use \Magento\Store\Model\StoreManagerInterface;
use \Kh\Switcher\Model\Cache\Switcher as SwitcherCache;

class Switcher extends \Magento\Framework\View\Element\Template
{
    protected $_storeManager;    
    protected $_switcherCache;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(Context $context, StoreManagerInterface $storeManager,SwitcherCache $switcherCache, array $data = []  ) {
        $this->_storeManager = $storeManager;   
        $this->_switcherCache = $switcherCache;
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getContent(){
        $cacheId    =   'khSwitcherId';
        $storeOptionArray = [];

        $khSwitcherId = $this->_switcherCache->load($cacheId);
        if($khSwitcherId){
            $storeOptionArray = unserialize($khSwitcherId);
        }else{
        $websites = $this->_storeManager->getWebsites();
            foreach($websites as $website){
                $wedsiteName = $website->getName();
                foreach($website->getStores() as $store){
                    $storeObj = $this->_storeManager->getStore($store);
                    $storeName = $storeObj->getName();
                    $url = $storeObj->getBaseUrl();
                    $storeOptionArray[$wedsiteName][] = ['name'=>$storeName, 'url'=>$url];
                }
            }
            $this->_switcherCache->save(serialize($storeOptionArray), $cacheId);
        }
        return $storeOptionArray;
    }
}
