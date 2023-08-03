<?php
declare(strict_types=1);

namespace Alfakher\CheckoutCustom\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class NexusLocation extends AbstractSource
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
                ['value' => 'alabama', 'label' => __('Alabama')],
                ['value' => 'alaska', 'label' => __('Alaska')],
                ['value' => 'american_samoa', 'label' => __('American Samoa')],
                ['value' => 'arizona', 'label' => __('Arizona')],
                ['value' => 'arkansas', 'label' => __('Arkansas')],
                ['value' => 'california', 'label' => __('California')],
                ['value' => 'colorado', 'label' => __('Colorado')],
                ['value' => 'connecticut', 'label' => __('Connecticut')],
                ['value' => 'delaware', 'label' => __('Delaware')],
                ['value' => 'district_of_columbia', 'label' => __('District of Columbia')],
                ['value' => 'florida', 'label' => __('Florida')],
                ['value' => 'georgia', 'label' => __('Georgia')],
                ['value' => 'guam', 'label' => __('Guam')],
                ['value' => 'hawaii', 'label' => __('Hawaii')],
                ['value' => 'idaho', 'label' => __('Idaho')],
                ['value' => 'illinois', 'label' => __('Illinois')],
                ['value' => 'indiana', 'label' => __('Indiana')],
                ['value' => 'iowa', 'label' => __('Iowa')],
                ['value' => 'kansas', 'label' => __('Kansas')],
                ['value' => 'kentucky', 'label' => __('Kentucky')],
                ['value' => 'louisiana', 'label' => __('Louisiana')],
                ['value' => 'maine', 'label' => __('Maine')],
                ['value' => 'maryland', 'label' => __('Maryland')],
                ['value' => 'massachusetts', 'label' => __('Massachusetts')],
                ['value' => 'michigan', 'label' => __('Michigan')],
                ['value' => 'minnesota', 'label' => __('Minnesota')],
                ['value' => 'mississippi', 'label' => __('Mississippi')],
                ['value' => 'missouri', 'label' => __('Missouri')],
                ['value' => 'montana', 'label' => __('Montana')],
                ['value' => 'nebraska', 'label' => __('Nebraska')],
                ['value' => 'nevada', 'label' => __('Nevada')],
                ['value' => 'new_hampshire', 'label' => __('New Hampshire')],
                ['value' => 'new_jersey', 'label' => __('New Jersey')],
                ['value' => 'new_mexico', 'label' => __('New Mexico')],
                ['value' => 'new_york', 'label' => __('New York')],
                ['value' => 'north_carolina', 'label' => __('North Carolina')],
                ['value' => 'north_dakota', 'label' => __('North Dakota')],
                ['value' => 'northern_marianas', 'label' => __('Northern Marianas')],
                ['value' => 'ohio', 'label' => __('Ohio')],
                ['value' => 'oklahoma', 'label' => __('Oklahoma')],
                ['value' => 'oregon', 'label' => __('Oregon')],
                ['value' => 'pennsylvania', 'label' => __('Pennsylvania')],
                ['value' => 'puerto_rico', 'label' => __('Puerto Rico')],
                ['value' => 'rhode_island', 'label' => __('Rhode Island')],
                ['value' => 'south_carolina', 'label' => __('South Carolina')],
                ['value' => 'south_dakota', 'label' => __('South Dakota')],
                ['value' => 'tennessee', 'label' => __('Tennessee')],
                ['value' => 'texas', 'label' => __('Texas')],
                ['value' => 'utah', 'label' => __('Utah')],
                ['value' => 'us_virgin_islands', 'label' => __('US Virgin Islands')],
                ['value' => 'vermont', 'label' => __('Vermont')],
                ['value' => 'virginia', 'label' => __('Virginia')],
                ['value' => 'washington', 'label' => __('Washington')],
                ['value' => 'west_virginia', 'label' => __('West Virginia')],
                ['value' => 'wisconsin', 'label' => __('Wisconsin')],
                ['value' => 'wyoming', 'label' => __('Wyoming')],
                ['value' => 'international', 'label' => __('International')],
            ];
        }
        return $this->_options;
    }
}
