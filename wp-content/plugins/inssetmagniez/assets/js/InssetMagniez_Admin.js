jQuery( document ).ready(function() {

    jQuery('.deleteButton').on('click', function(e) {
        //stoppe les events par défaut
        e.stopPropagation();
        e.preventDefault();

        var _this = jQuery(this);

        let data = {
            'action' : 'removeNewsletter' ,
            'security' : inssetscript.security,
            'idDelete' : jQuery(this).data('id'),
        };

        jQuery.post(ajaxurl, data, function( rs ){
            _this.closest('tr').fadeOut('slow');
            jQuery('delete_confirmation').removeClass('hide');
            return false;
        })
    });
    
    //return false;

    jQuery('#insset_param_update button').on('click', function(e){
        let formData = new FormData();
        e.stopPropagation();
        e.preventDefault();
    
        formData.append('action', 'updateConfig');
        formData.append('security', inssetscript.security);

        jQuery('#insset_param_update input').each( function() {

            let id = jQuery(this).attr('id');
            let value = jQuery(this).val();
            formData.append(id, value);
        
        });

        jQuery.ajax({
            url: ajaxurl,
            xhrFields: {
                withCredentials: true
            },
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            success: function(rs) {
                alert(rs);
                return false;
            }

        })
    
    });

});

