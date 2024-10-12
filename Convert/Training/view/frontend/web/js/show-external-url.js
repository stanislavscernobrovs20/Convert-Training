/**
 * @author Convert Team
 * @copyright Copyright (c) Convert (https://www.convert.no/)
 */
define([
    'uiComponent',
    'ko'
], function (Component, ko) {
    'use strict';

    return Component.extend({
        showUrl: ko.observable(false),

        initialize: function () {
            this._super();
        },

        showExternalUrlButton: function() {
            if (!this.showUrl()) {
                this.showUrl(true);
            } else {
                this.showUrl(false);
            }
        }
    });
});
