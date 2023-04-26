<?php
/**
 * Copyright © Mindsprint (contactus@mindsprint.org). All rights reserved.
 * Please visit Mindsprint.org for license details (https://mindsprint.org).
 */
namespace Mindsprint\StockStatus\Block\Catalog\Product;

use Magento\Catalog\Block\Product\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\Registry;
use Magento\CatalogInventory\Api\StockStateInterface;
 
class View extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Registry
     */
    protected $registry;
    /**
     * @var StockStateInterface
     */
    protected $stockState;
    
    /**
     * @param Context $context
     * @param Registry $registry
     * @param StockStateInterface $stockState
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        StockStateInterface $stockState,
        array $data
    ) {
        $this->registry = $registry;
        $this->stockState = $stockState;
        parent::__construct($context, $data);
    }
    
    /**
     * Retrieve 1 if display author information is enabled
     * @return int
     */
    public function statusEnabled()
    {
        return (int) $this->_scopeConfig->getValue(
            'stockstatus/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    
    public function currentProductStatus()
    {
        $hightStockError = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/hightstockerror',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $hightStockColour = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/hightstockcolour',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $mediumStockQty = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/mediumstockqty',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $mediumstockError = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/mediumstockerror',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $mediumStockColour = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/mediumstockcolour',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $lowStockQty = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/lowstockqty',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $lowstockError = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/lowstockerror',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $lowStockColour = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/lowstockcolour',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $outofStockError = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/outofstockerror',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $outofStockColour = $this->_scopeConfig->getValue(
            'stockstatus/stock_status/outofstockcolour',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
        $product = $this->registry->registry('current_product');
        $productId = $product->getId();
        $websiteId = $product->getStore()->getWebsiteId();
        $stock = $this->stockState->getStockQty($productId, $websiteId);
        
        $content = [];
        $content['stock'] = $stock;
        $content['hightStockError'] = $hightStockError;
        $content['hightStockColour'] = $hightStockColour;
        $content['mediumStockQty'] = $mediumStockQty;
        $content['mediumstockError'] = $mediumstockError;
        $content['mediumStockColour'] = $mediumStockColour;
        $content['lowStockQty'] = $lowStockQty;
        $content['lowstockError'] = $lowstockError;
        $content['lowStockColour'] = $lowStockColour;
        $content['outofStockError'] = $outofStockError;
        $content['outofStockColour'] = $outofStockColour;
        return $content;
    }
}
