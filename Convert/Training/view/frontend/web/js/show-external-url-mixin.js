/**
 * @author Convert Team
 * @copyright Copyright (c) Convert (https://www.convert.no/)
 */
define([], function () {
    'use strict';

    return function (Component) {
        return Component.extend({
            showExternalUrlButton: function() {
                if (!this.showUrl()) {
                    this.showUrl(true);
                } else {
                    this.showUrl(false);
                }

                console.log('Show Url Button Clicked');
            }
        });
    }
});
