<?php
/**
 * @author    JaJuMa GmbH <info@jajuma.de>
 * @copyright Copyright (c) 2023 JaJuMa GmbH <https://www.jajuma.de>. All rights reserved.
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */
namespace Jajuma\PotHoneySpam\Block\PowerToys;
use Jajuma\PowerToys\Block\PowerToys\Dashboard;
use Magento\Framework\View\Element\Template\Context;
use Jajuma\PotHoneySpam\Helper\Data;
use Magento\Store\Model\StoreManagerInterface;

class HoneySpam extends Dashboard
{
    private $helper;

    private $storeManager;

    private $store;

    public function __construct(
        Data $helper,
        StoreManagerInterface $storeManager,
        Context $context,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function isParentEnable(): bool
    {
        return $this->helper->isParentEnable();
    }

    public function isEnable(): bool
    {
        return $this->helper->isEnable();
    }
}
