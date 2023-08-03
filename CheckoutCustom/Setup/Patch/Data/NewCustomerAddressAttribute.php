<?php declare(strict_types=1);

/**
 * Patch to create Customer Address Attribute
 *
 * Creates  custom address attribute
 */

namespace Alfakher\CheckoutCustom\Setup\Patch\Data;

use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class NewCustomerAddressAttribute
 */
class NewCustomerAddressAttribute implements DataPatchInterface
{
    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * AddressAttribute constructor.
     *
     * @param Config $eavConfig
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        Config          $eavConfig,
        EavSetupFactory $eavSetupFactory
    )
    {
        $this->eavConfig = $eavConfig;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create();

        $attributes = [
            'fein_number' => [
                'type' => 'varchar',
                'input' => 'text',
                'label' => 'FEIN Number',
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'system' => false,
                'group' => 'General',
                'global' => true,
                'is_visible_in_grid' => true,
                'visible_on_front' => true,

            ],
            'tobacco_license_number' => [
                'type' => 'varchar',
                'input' => 'text',
                'label' => 'Tobacco License Number',
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'system' => false,
                'group' => 'General',
                'global' => true,
                'is_visible_in_grid' => true,
                'visible_on_front' => true,
            ],
            'tobacco_license_expiry_date' => [
                'type' => 'datetime',
                'input' => 'date',
                'label' => 'Tobacco License Expiry Date',
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'system' => false,
                'group' => 'General',
                'global' => true,
                'is_visible_in_grid' => true,
                'visible_on_front' => true,

            ],
            'tobacco_license_type' => [
                'type' => 'varchar',
                'input' => 'select',
                'source' => \Alfakher\CheckoutCustom\Model\Config\Source\TobaccoType::class,
                'label' => 'Type of Tobacco License',
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'system' => false,
                'group' => 'General',
                'global' => true,
                'is_visible_in_grid' => true,
                'visible_on_front' => true,

            ],
            'resale_license_number' => [
                'type' => 'varchar',
                'input' => 'text',
                'label' => 'Resale License Number',
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'system' => false,
                'group' => 'General',
                'global' => true,
                'is_visible_in_grid' => true,
                'visible_on_front' => true,

            ],
            'resale_license_expiry_date' => [
                'type' => 'datetime',
                'input' => 'date',
                'label' => 'Resale License Expiry Date',
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'system' => false,
                'group' => 'General',
                'global' => true,
                'is_visible_in_grid' => true,
                'visible_on_front' => true,

            ],

            'ship_add_dropdown' => [
                'type' => 'varchar',
                'input' => 'select',
                'label' => 'Shipping address classification dropdown',
                'visible' => true,
                'required' => false,
                'source' => \Alfakher\CheckoutCustom\Model\Config\Source\ShipDropdown::class,
                'user_defined' => true,
                'system' => false,
                'group' => 'General',
                'global' => true,
                'is_visible_in_grid' => true,
                'visible_on_front' => true,

            ],

            'nexus_location' => [
                'type' => 'varchar',
                'input' => 'select',
                'source' => \Alfakher\CheckoutCustom\Model\Config\Source\NexusLocation::class,
                'label' => 'NEXUS Location',
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'system' => false,
                'group' => 'General',
                'global' => true,
                'is_visible_in_grid' => true,
                'visible_on_front' => true,
            ],

        ];

        foreach ($attributes as $attributeCode => $attributeConfig) {

            $eavSetup->removeAttribute('customer_address', $attributeCode);

            $eavSetup->addAttribute('customer_address', $attributeCode, $attributeConfig);

        $customAttribute = $this->eavConfig->getAttribute('customer_address', $attributeCode);

        $customAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address']
        );
        $customAttribute->save();

        }


    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return [];
    }
}
