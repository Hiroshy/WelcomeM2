<?php

namespace Adobe\WelcomeMessage\Block;
use Magento\Framework\View\Element\Template;
class Welcome extends Template
{
    CONST MODULE_PATH="welcomemessage/adobewelcomemessage/";
    private \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig;

    public function __construct
    (
        Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return mixed|void
     */
    public function getMessage(){
        $is_enable = $this->isEnable();
         if ($is_enable){
            return $this->scopeConfig->getValue(self::MODULE_PATH.'mensaje',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        }
    }

    /**
     * @return mixed
     */
    public function isEnable(){
        $is_enable = $this->scopeConfig->getValue(self::MODULE_PATH.'enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $is_enable;
    }
}
