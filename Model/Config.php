<?php

namespace KsSoft\AlphaBankCredit\Model;

use KsSoft\AlphaBankCredit\Api\ConfigInterface;
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
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_CONFIG_GENERAL . 'enable',
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseParam($param)
    {
        return $this->scopeConfig->getValue(
            self::XML_CONFIG_GENERAL . $param,
            ScopeInterface::SCOPE_STORE
        );
    }
}