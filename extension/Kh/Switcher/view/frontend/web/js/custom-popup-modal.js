define([
        "jquery", "Magento_Ui/js/modal/modal"
    ], function($, modal){
        var CustomPopupModal = {
            initModal: function(config, element) {

                var options = {
                    type: 'popup',
                    responsive: true,
                    innerScroll: true,
                    title: '',
                    buttons: false,
                };

                $target = $(config.target);
                $target.modal(options);
                $element = $(element);
                $element.click(function() {
                    $target.modal('openModal');
                });
            }
        };

        return {
            'custom-popup-modal': CustomPopupModal.initModal
        };
    }
);