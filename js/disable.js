/**
 * @author Taffarel Xavier
 * @returns {Object}
 */
(function () {
    $.fn.disableTextBox = function () {
        
        var input = $(this);
        
        $(input).keydown(function (event) {
            if (event.ctrlKey) {
                return false;
            }
        }).bind("copy", function () {
            return false;
        }).bind("cut", function () {
            return false;
        }).bind("paste", function () {
            return false;
        }).bind("contextmenu", function () {
            return false;
        });
        return this;
    };
})($);