define([
    'jquery',
    'Magento_Ui/js/lib/validation/utils',
    'Magento_Ui/js/form/element/abstract',
    'Magento_Ui/js/lib/validation/validator'
], function ($, utils, Abstract, validator) {
    'use strict';

    validator.addRule(
        "validate-custom-identifier",
        function(value) {
            return utils.isEmptyNoTrim(value) || /^[a-z0-9][a-z0-9_\/-]+(\.[a-z0-9_-]+)?$/.test(value);
        },
        $.mage.__('Please enter a valid URL Key (Ex: "abcdef"!!!!!).')
    );

    return Abstract;
});
