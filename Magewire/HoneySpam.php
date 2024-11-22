<?php declare(strict_types=1);
/**
 * @author    JaJuMa GmbH <info@jajuma.de>
 * @copyright Copyright (c) 2023 JaJuMa GmbH <https://www.jajuma.de>. All rights reserved.
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Jajuma\PotHoneySpam\Magewire;

use Magewirephp\Magewire\Component;
use Jajuma\PotHoneySpam\Helper\Data;
use Jajuma\HoneySpam\Model\ResourceModel\SpamLog\CollectionFactory as SpamLogCollectionFactory;
class HoneySpam extends Component
{
    public $countSpam = 0;

    private $helper;

    public $hours = 0;

    private $spamLogCollectionFactory;

    public function __construct(
        Data $helper,
        SpamLogCollectionFactory $spamLogCollectionFactory
    ) {
        $this->helper = $helper;
        $this->spamLogCollectionFactory = $spamLogCollectionFactory;
    }

    public function mount(): void
    {
        $this->hours = $this->helper->getHours();
        $this->fetchSpam();
        parent::mount();
    }

    public function fetchSpam()
    {
        $spamLogCollection = $this->spamLogCollectionFactory->create()
                                ->addFieldToFilter(
                                    'created_at',
                                    ['gteq' => date("Y-m-d H:i:s", strtotime("-".$this->helper->getHours()." hours"))]
                                );
        $this->countSpam = $spamLogCollection->getSize();
    }
}
