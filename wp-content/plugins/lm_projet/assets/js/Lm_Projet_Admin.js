jQuery( document ).ready(function() {

    jQuery('.updateButton').on('click', function (e) {
        //stoppe les events par défaut
        e.stopPropagation();
        e.preventDefault();

        var _this = jQuery(this);

        let data = {
            'action': 'changeDisponibility',
            'security': lmprojetscript.security
        };

        jQuery.post(ajaxurl, data, function (rs) {
            alert('coucou');
            return false;
        })
    });

    jQuery(".acessible").on('click',function (e) {
        e.stopPropagation();
        e.preventDefault();

        var _this = jQuery(this);

        let data;

        if (this.checked)
            data = {
                action: "changeAccess",
                security: lmprojetscript.security
            };
        else
            data = {
                action: "change_access",
                security: lmprojetscript.security,
                iso: jQuery(this).data("id"),
                majeur: 0,
            };

        jQuery.post(ajaxurl, datas, function (rs) {
            jQuery(".is-dismissible").show("slow");

            setTimeout(() => {
                jQuery(".is-dismissible").hide("slow");
            }, "1000");
            return false;
        })
    });
});
