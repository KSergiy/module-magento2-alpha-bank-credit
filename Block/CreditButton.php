<?php

namespace KsSoft\AlphaBankCredit\Block;

use Magento\Framework\View\Element\Block\ArgumentInterface,
    Magento\Framework\Registry;
use KsSoft\AlphaBankCredit\Api\ConfigInterface;

/**
 * Class CreditButton
 *
 * @package KsSoft\AlphaBankCredit\Block
 */
class CreditButton implements ArgumentInterface
{
    const URL = 'https://alfabank.ua/credit/bpk-new/?product=%s&price=%s&partner=%s';

    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @var Registry
     */
    private $registry;

    /**
     * CreditButton constructor.
     * @param ConfigInterface $config
     * @param Registry $registry
     */
    public function __construct(
        ConfigInterface $config,
        Registry $registry
    ) {
        $this->config = $config;
        $this->registry = $registry;
    }

    /**
     * Is enabled
     *
     * @return mixed
     */
    public function isEnabled()
    {
        return ($this->config->isEnabled() && !empty($this->config->getBaseParam('partner_id')));
    }

    /**
     * Get button text
     *
     * @return mixed
     */
    public function getButtonText()
    {
        return $this->config->getBaseParam('button_text');
    }

    /**
     * Get URL
     *
     * @return string
     */
    public function getUrl()
    {
        if (!$product = $this->getProduct()) {
            return null;
        }

        $productTitle = $product->getName();
        $productPrice = $product->getFinalPrice();
        $partnerId = $this->config->getBaseParam('partner_id');

        $url = sprintf(self::URL, $productTitle, $productPrice, $partnerId);

        return $url;
    }

    /**
     * Get product
     *
     * @return mixed
     */
    private function getProduct()
    {
        return $this->registry->registry('product');
    }
}
