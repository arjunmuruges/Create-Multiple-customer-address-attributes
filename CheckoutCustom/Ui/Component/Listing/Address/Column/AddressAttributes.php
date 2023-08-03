<?php
declare(strict_types=1);

namespace Alfakher\CheckoutCustom\Ui\Component\Listing\Address\Column;

use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class AddressAttributes extends Column
{
    /**
     * Constructor
     *
     * @param AddressRepositoryInterface $addressRepository
     * @param CustomerFactory $customerFactory
     * @param UiComponentFactory $uiComponentFactory
     * @param ContextInterface $context
     * @param array $components
     * @param array $data
     */
    public function __construct(
        AddressRepositoryInterface $addressRepository,
        CustomerFactory $customerFactory,
        UiComponentFactory $uiComponentFactory,
        ContextInterface $context,
        array $components = [],
        array $data = []
    ) {
        $this->addressRepository = $addressRepository;
        $this->customerFactory = $customerFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            $i = 0;
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['entity_id'])) {
                    $customerId = $item['parent_id'];
                    $customer = $this->customerFactory->create()->load($customerId);

                    $customerAddress = [];
                    foreach ($customer->getAddresses() as $address) {
                        $customerAddress[] = $address->toArray();
                    }

                    $addressId = $customerAddress[$i]['entity_id'];
                    $addresses = $this->addressRepository->getById($addressId);

                    $nexusLocation = $addresses->getCustomAttribute('nexus_location')->getValue();
                    $item['nexus_location'] = $nexusLocation;

                    $tobacoLicencetype = $addresses->getCustomAttribute('tobacco_license_type')->getValue();
                    $item['tobacco_license_type'] = $tobacoLicencetype;

                    if ($addresses->getCustomAttribute('ship_add_dropdown') != null) {
                        $shipOptions = $addresses->getCustomAttribute('ship_add_dropdown')->getValue();
                        $item['ship_add_dropdown'] = $shipOptions;
                    }
                }
                $i++;
            }
        }

        return $dataSource;
    }
}
