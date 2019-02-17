<?php declare(strict_types = 1);

namespace KsSoft\AlphaBankCredit\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface,
    Magento\Framework\Registry;
use KsSoft\AlphaBankCredit\Model\Config;

/**
 * Class CreditButton
 *
 * @package KsSoft\AlphaBankCredit\ViewModel
 */
class CreditButton implements ArgumentInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var Registry
     */
    private $registry;

    /**
     * CreditButton constructor.
     * @param Config $config
     * @param Registry $registry
     */
    public function __construct(
        Config $config,
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

        $url = sprintf(Config::URL, $productTitle, $productPrice, $partnerId);

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
