<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Product Child tab
 */
namespace Magento\Catalog\Block\Adminhtml\Product\Edit\Tab;

class ChildTab extends \Magento\Backend\Block\Template
{
    /**
     * @var \Magento\Backend\Block\Widget\Tab\TabInterface
     */
    protected $tab;

    /**
     * @param \Magento\Backend\Block\Widget\Tab\TabInterface $tab
     * @return $this
     */
    public function setTab(\Magento\Backend\Block\Widget\Tab\TabInterface $tab)
    {
        $this->tab = $tab;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->tab->getTabTitle();
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->tab->toHtml();
    }

    public function getTabId()
    {
        return $this->tab->getTabId();
    }
}
