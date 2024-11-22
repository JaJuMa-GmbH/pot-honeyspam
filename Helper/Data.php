<?php
/**
 * @author    JaJuMa GmbH <info@jajuma.de>
 * @copyright Copyright (c) 2023 JaJuMa GmbH <https://www.jajuma.de>. All rights reserved.
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */
namespace Jajuma\PotHoneySpam\Helper;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\Helper\AbstractHelper;
/**
 * Class Data
 * @package Jajuma\PotHoneySpam\Helper
 */
class Data extends AbstractHelper
{
    public const HONEYSPAM_ENABLED = 'honeyspam/honeyspam/enable_honeyspam';

    public const POT_HONEYSPAM_ENABLED = 'power_toys/pot_honeyspam/is_enabled';

    public const POT_HONEYSPAM_HOURS = 'power_toys/pot_honeyspam/spam_hours';

    /**
     * @param null $store
     * @return bool
     */
    public function isParentEnable($store = null)
    {
        return (int) $this->scopeConfig->getValue(
            self::HONEYSPAM_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @param null $store
     * @return bool
     */
    public function isEnable($store = null)
    {
        return (int) $this->scopeConfig->getValue(
            self::POT_HONEYSPAM_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @param null $store
     * @return bool
     */
    public function getHours($store = null)
    {
        return $this->scopeConfig->getValue(
            self::POT_HONEYSPAM_HOURS,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }
}
