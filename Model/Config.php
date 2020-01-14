<?php

declare(strict_types = 1);

namespace KsSoft\AlphaBankCredit\Model;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config implements ConfigInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_CONFIG_GENERAL_ENABLE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get partner ID
     *
     * @return null|string
     */
    public function getPartnerId(): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_CONFIG_GENERAL_PARTNER_ID,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get button text
     *
     * @return null|string
     */
    public function getButtonText(): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_CONFIG_GENERAL_BUTTON_TEXT,
            ScopeInterface::SCOPE_STORE
        );
    }
}
