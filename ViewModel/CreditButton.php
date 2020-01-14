<?php

declare(strict_types = 1);

namespace KsSoft\AlphaBankCredit\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Helper\Data;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use KsSoft\AlphaBankCredit\Model\ConfigInterface;

/**
 * Class CreditButton
 *
 * @package KsSoft\AlphaBankCredit\ViewModel
 */
class CreditButton implements ArgumentInterface
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @var Data
     */
    private $catalogHelper;

    /**
     * CreditButton constructor.
     * @param ConfigInterface $config
     * @param Data $catalogHelper
     */
    public function __construct(
        ConfigInterface $config,
        Data $catalogHelper
    ) {
        $this->config = $config;
        $this->catalogHelper = $catalogHelper;
    }

    /**
     * Is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return ($this->config->isEnabled() && !empty($this->config->getPartnerId()));
    }

    /**
     * Get button text
     *
     * @return null|string
     */
    public function getButtonText(): ?string
    {
        return $this->config->getButtonText();
    }

    /**
     * Get URL
     *
     * @return null|string
     */
    public function getUrl(): ?string
    {
        if (!$product = $this->getProduct()) {
            return null;
        }

        $productTitle = $product->getName();
        $productPrice = $product->getFinalPrice();
        $partnerId = $this->config->getPartnerId();

        return sprintf(ConfigInterface::URL, $productTitle, $productPrice, $partnerId);
    }

    /**
     * Get product
     *
     * @return null|ProductInterface
     */
    private function getProduct(): ?ProductInterface
    {
        return $this->catalogHelper->getProduct();
    }
}
