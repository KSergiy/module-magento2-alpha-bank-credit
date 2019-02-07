<?php

namespace KsSoft\AlphaBankCredit\Api;

interface ConfigInterface
{
    const XML_CONFIG_GENERAL = 'alpha_bank_credit/base/';

    /**
     * Check is enables
     *
     * @return boolean
     */
    public function isEnabled();

    /**
     * Get base param
     *
     * @param $param
     * @return mixed
     */
    public function getBaseParam($param);
}