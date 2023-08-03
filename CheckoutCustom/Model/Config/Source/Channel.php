<?php
declare(strict_types=1);

namespace Alfakher\CheckoutCustom\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Channel extends AbstractSource
{
    /**
     * GetAllOptions
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => '', 'label' => __('Please select the channel')],
                ['value' => 'distributor', 'label' => __('Distributor')],
                ['value' => 'retailer/lounge', 'label' => __('Retailer/Lounge')],
            ];
        }
        return $this->_options;
    }
}
