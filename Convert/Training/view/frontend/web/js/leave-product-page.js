/**
 * @author Convert Team
 * @copyright Copyright (c) Convert (https://www.convert.no/)
 */
define([
    'uiComponent'
], function (Component) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
            window.onbeforeunload = function() {
                return true;
            };
        }
    });
});
