// define(
//     [
//         'jquery',
//         'Magento_Customer/js/model/address-list',
//         'mage/translate'
//     ],
//     function ($, addressList, $t) {
//         'use strict';
//         return function (Component) {
//             return Component.extend({
//                 // your condition if need to add "New Address" option
//                 canManageAddresses: window.checkoutConfig.canManageAddresses,
//
//                 initialize: function () {
//                     this.addressOptions = this.getAddressOptions();
//                     return this._super();
//                 },
//
//                 /**
//                  * Add "New Address" option only if allowed
//                  * @returns {array}
//                  */
//                 getAddressOptions: function () {
//                     let newAddressOption = {
//                             /**
//                              * Get new address label
//                              * @returns {String}
//                              */
//                             getAddressInline: function () {
//                                 return $t('New Address');
//                             },
//                         },
//                         addressOptions = addressList().filter(function (address) {
//                             return address.getType() === 'customer-address';
//                         });
//
//                     // add "New Address" option only if need !!!
//                     if (this.canManageAddresses) {
//                         addressOptions.push(newAddressOption);
//                     }
//                     return addressOptions;
//                 }
//             });
//         }
//     }
// );
