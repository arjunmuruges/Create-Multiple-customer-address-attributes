<?php declare(strict_types=1);

/**
 * Patch to create Customer  Attribute
 *
 * Creates  customer  attribute
 */
namespace Alfakher\CheckoutCustom\Setup\Patch\Data;

use Magento\Customer\Setup\CustomerSetup;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddCustomerAttribute implements DataPatchInterface
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var CustomerSetup
     */
    private $customerSetupFactory;

    /**
     * Constructor
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $customerSetup->removeAttribute('customer', 'tax_exempt');
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'tax_exempt',
            [
                'type' => 'int',
                'label' => 'Tax Exempt',
                'input' => 'boolean',
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 507,
                'backend' => '',
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
            ]
        );

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'tax_exempt')->addData([
            'used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ],
        ]);
        $attribute->save();

        $customerSetup->removeAttribute('customer', 'channel');
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'channel',
            [
                'type' => 'varchar',
                'label' => 'Channel',
                'input' => 'select',
                'source' => \Alfakher\CheckoutCustom\Model\Config\Source\Channel::class,
                'default' => 1,
                'position' => 30,
                'required' => false,
                'visible' => true,
                'system' => false,
                'backend' => '',
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
            ]
        );

        $attributeDetails = $customerSetup->getEavConfig()->getAttribute('customer', 'channel')
            ->addData([
                'used_in_forms' => [
                    'adminhtml_customer',
                    'adminhtml_customer_address',
                    'customer_address_edit',
                    'customer_register_address'
                ],
            ]);
        $attributeDetails->save();

    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }
}
