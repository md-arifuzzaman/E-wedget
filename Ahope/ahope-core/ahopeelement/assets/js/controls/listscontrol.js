(function($){
    "user strict";

    $( window ).on( 'elementor:init', function() {
        var Appilo_Lists = elementor.modules.controls.BaseData.extend({
            wrapper: null,
            items: null,
            add_btn: null,
            delete_btn: null,
            template: null,
            onReady: function () {
                var self = this;
                this.wrapper = $(this.el);
                this.items = this.wrapper.find(".ahope-group-item");
                this.add_btn = this.wrapper.find(".ahope-group-add");
                this.template = this.wrapper.find(".ahope-template").val();

                self.setupDeleteBtn();
                this.add_btn.on("click", function(){
                    var new_item = $(self.template);
                    self.wrapper.find(".ahope-group").append(new_item);
                    setTimeout(function(){
                        self.setupDeleteBtn();
                        self.items = self.wrapper.find(".ahope-group-item");
                    }, 300);
                    self.saveValue();
                });
            },

            setupDeleteBtn: function () {
                var self = this;
                self.delete_btn = self.wrapper.find(".ahope-group-delete");
                self.delete_btn.on("click", function(e){
                    e.preventDefault();
                    $(this).parent().remove();
                    self.items = self.wrapper.find(".ahope-group-item");
                    self.saveValue();
                });
            },

            saveValue: function () {
                var values = [];
                $.each(this.items, function(index, item){
                    var item_val = {};
                    item_val.content_list = $(item).find(".ahope-list-content").val();
                    values.push(item_val);
                });
                this.setValue(JSON.stringify(values));
            },

            onBeforeDestroy: function () {
                this.saveValue();
            }
        });

        elementor.addControlView('ahope_lists_control', Appilo_Lists);
    } );
}(jQuery));