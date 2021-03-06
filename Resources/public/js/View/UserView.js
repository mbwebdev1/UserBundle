Core.ns('App.User.View');

App.User.View.UserView = Backbone.View.extend({
    el: $('#user-main'),

    events: {
        "click #save-user": "handleSave",
        "click #user-passwordRequired": "handlePasswordRequiredChange"
    },

    initialize: function() {

        this.template = _.template($('#user-edit-template').html());

        _.bindAll(this, 'render');
        this.render();
    },

    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));

        this.updateBreadcrumb();

        $(".chzn-select").chosen();
        $(".chzn-single").chosen();
        $('[rel=tooltip]').tooltip('hide');
        $('[rel=tooltip]').tooltip();

        this.updatePasswordFieldVisibility();

        return this;
    },

    handlePasswordRequiredChange: function() {
        this.updatePasswordFieldVisibility();
    },

    handleSave: function() {
        $('form:input').removeClass('error');
        $('form div').removeClass('error');
        $('#notification-error-body').html('');

        this.isNew = this.model.isNew();
        var self = this;

        this.model.save(this.getFormValues(), {
            success: function(user, response) {
                $('.alert-success').show();
                $('.alert-error').hide();

                if (self.isNew) {
                    self.collection.add(user);
                }
            },
            error: function(user, response){
                if (response.responseText !== undefined && response.status != 406) {
                    // Server error
                    $('#notification-error-body').append(response.responseText);
                }
                else {
                    response = JSON.parse(response.responseText);

                    $.each(response, function(key, value) {
                        $('#user-'+key+'-div').addClass('error');
                        $('#user-'+key).addClass('error');
                        $('#notification-error-body').append(ExposeTranslation.get('rtxlabs.user.validation.'+key)+'<br/>');
                    });
                }

                $('.alert-success').hide();
                $('.alert-error').show();
            }
        });
    },

    getFormValues: function() {
        var values = new Backbone.Model();
        var idPattern = /(\w.+)\-(\w*\d*\-*_*)/;

        var collection = $('form [name^="user["]');

        $('form [name^="user["]').each(function(index, dom) {

            var el = $(dom);
            var result = dom.id.match(idPattern);

            var obj = "{\""+result[2] +"\":\""+el.val()+"\"}";
            var objInst = JSON.parse(obj);

            values.set(objInst);
        });

        values.attributes.passwordRequired = $("#user-passwordRequired").attr('checked') == 'checked';
        values.attributes.admin = $("#user-admin").attr('checked') == 'checked';

        return values.attributes;
    },

    updatePasswordFieldVisibility: function() {
        var passwordRequired = $('#user-passwordRequired').attr('checked') == 'checked';

        if (passwordRequired) {
            $('#user-password-div').show();
            $('#user-passwordRepeat-div').show();
        }
        else {
            $('#user-password-div').hide();
            $('#user-passwordRepeat-div').hide();
        }
    },

    updateBreadcrumb: function() {
        var lastSpanEl = $(".breadcrumb .divider").last().parent();
        lastSpanEl.next().remove();
        $(".breadcrumb").append("<li>"+ExposeTranslation.get('rtxlabs.user.edit.header')+"</li>");
    }
});
