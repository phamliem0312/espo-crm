define('basic-theme:views/handler-list', [], function () {

    class HandlerList {

        /**
         * @param {module:view} view
         */
        constructor(view) {
            this.view = view;
        }

        process() {
            this.listenTo(this.view, 'after:render', () => {
                this.view.$el.find('.search-container .search-row .add-filter-button span').remove('');
                this.view.$el.find('.search-container .search-row .add-filter-button').append('<span class="fi fi-rr-settings-sliders"></span>');
            });
        }
    }

    // Establish event support.
    Object.assign(HandlerList.prototype, Backbone.Events);

    return HandlerList;
});
