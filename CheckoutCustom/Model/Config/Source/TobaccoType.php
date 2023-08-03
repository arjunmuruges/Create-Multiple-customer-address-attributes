<?php
declare(strict_types=1);

namespace Alfakher\CheckoutCustom\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class TobaccoType extends AbstractSource
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
                ['value' => '', 'label' => __('Please select the tobacco license type')],
                ['value' => 'distributor', 'label' => __('Distributor')],
                ['value' => 'retail', 'label' => __('Retail')],
            ];
        }
        return $this->_options;
    }
}
