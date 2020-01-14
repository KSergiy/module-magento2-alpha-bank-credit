<?php

declare(strict_types = 1);

namespace KsSoft\AlphaBankCredit\Model;

/**
 * Interface ConfigInterface
 * @package KsSoft\AlphaBankCredit\Model
 */
interface ConfigInterface
{
    /**#@+
     * Xml path of AlphaBankCredit configs
     */
    const XML_CONFIG_GENERAL_ENABLE = 'alpha_bank_credit/base/enable';
    const XML_CONFIG_GENERAL_PARTNER_ID = 'alpha_bank_credit/base/partner_id';
    const XML_CONFIG_GENERAL_BUTTON_TEXT = 'alpha_bank_credit/base/button_text';
    /**#@-*/

    /**#@+
     * URL path of AlphaBankCredit Api
     */
    const URL = 'https://iloan.alfabank.kiev.ua/iloanform/app/new?product=%s&price=%s&partner=%s';
    /**#@-*/

    /**
     * Is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool;

    /**
     * Get partner ID
     *
     * @return null|string
     */
    public function getPartnerId(): ?string;

    /**
     * Get button text
     *
     * @return null|string
     */
    public function getButtonText(): ?string;
}
