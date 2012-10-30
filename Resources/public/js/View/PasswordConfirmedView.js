Core.ns('App.User.View.');

App.User.View.PasswordConfirmedView = Backbone.View.extend({
   el: $('#password-main'),

    initialize: function() {
        this.template = _.template($('#password-confirmed-template').html());
        _.bindAll(this, 'render');
    },

    render: function() {
        $(this.el).html(this.template());
        return this;
    }
});