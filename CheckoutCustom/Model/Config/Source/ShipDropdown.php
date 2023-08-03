<?php
declare(strict_types=1);

namespace Alfakher\CheckoutCustom\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class ShipDropdown extends AbstractSource
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
                ['value' => '', 'label' => __('Please select the shipping dropdown')],
                ['value' => 'license_location', 'label' => __('License Location')],
                ['value' => 'forward_pickup', 'label' => __('Forwarder Pick up')],
                ['value' => 'home', 'label' => __('Home')],
            ];
        }
        return $this->_options;
    }
}
