<?php

namespace KsSoft\AlphaBankCredit\Test\Unit\Model;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use KsSoft\AlphaBankCredit\Model\Config;
use PHPUnit\Framework\TestCase;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ConfigTest extends TestCase
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Pre set up
     */
    protected function setUp()
    {
        $objectManager = new ObjectManager($this);
        $this->scopeConfig = $this->createMock(ScopeConfigInterface::class);
        $this->config = $objectManager->getObject(
            Config::class,
            [
                'scopeConfig' => $this->scopeConfig
            ]
        );
    }

    /**
     * @param $flag
     * @dataProvider isEnabledProvider
     */
    public function testIsEnabled($flag)
    {
        $this->scopeConfig->expects($this->once())
            ->method('isSetFlag')
            ->willReturn($flag);

        $this->assertInternalType('bool', $this->config->isEnabled());
    }

    public function isEnabledProvider()
    {
        return [
            'enabled' => [true, true],
            'disabled' => [true, false]
        ];
    }
}
