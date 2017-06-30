define([
        'jquery'
    ],
    function($){
        "use strict";

        $.widget('mage.article2color', {
            "options": {
                "colorUrl": ""
            },

            _init: function() {
                var self = this;
                $('#article2_general_shape').change(function() {
                    var shape = $('#article2_general_shape').find(':selected').val();
                    self._loadColor(shape);
                });
            },

            _loadColor: function(shape) {
                var self = this;
                var colorUrl = this.options.colorUrl;
                $('#article2_general_color').empty();
                $('#article2_general_color').append($('<option>', {
                    value: -1,
                    text : 'Select one color'
                }));
                $.ajax({
                        url: colorUrl,
                        data: {'form_key':  window.FORM_KEY, 'shape': shape},
                        type: 'POST',
                        dataType: 'json',
                        showLoader: true
                    }
                ).done(function(data) {
                    $.each(data , function(i,item) {
                        $('#article2_general_color').append($('<option>', {
                            value: item.id,
                            text : item.label
                        }));
                    });
                });
            }
        });
        return $.mage.article2color;
    });