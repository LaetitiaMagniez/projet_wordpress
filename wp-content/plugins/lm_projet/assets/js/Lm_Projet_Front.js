
jQuery( document ).ready(function() {

    jQuery('#prospect_inscription').on('submit', function(e) {

        e.stopPropagation();
        e.preventDefault();

        let formData = new FormData();
        formData.append('action', 'prospectsInscription');
        formData.append('security', lmprojetscript.security);

        jQuery('#prospect_inscription').find('input, textarea, select').each( function(i){
            var id = jQuery(this).attr('id');
            if (typeof id !== 'undefined')
                formData.append(id, jQuery(this).val());
        });

        jQuery("#loading").show();

        jQuery.ajax({
            url: lmprojetscript.ajax_url,
            xhrFields: {
                withCredentials: true
            },
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            success: function(rs, textStatus, jqXHR) {
                    //aller à la page suivante
                    window.sessionStorage.setItem("Authorisation", "step1,step2");
                // on utilise le chemin de l'article créé avec le shortcode [CHOIX_PAYS]
                window.location.replace("http://localhost/wordpress/2023/03/27/choix-de-pays/?id="+rs);
                    //return false;
                },
            });
    })

        // boucle for pour passer de du pays selectionné 1 au pays numéro 5
        for (let i = 1; i < 5; i++) {
            jQuery('#lm_projet_pays' + i).change(() => {
                jQuery('#lm_projet_pays' + (i + 1) + "_container").removeClass(
                    "disable-select-pays"
                );
                //bouton pays 1/2/3/4/5
                if (i == 1)
                    jQuery('#lm_projet_pays_selectionnes-submit').removeClass(
                        "disable-select-pays"
                    );
            });
        }

        //Ajax du formulaire des pays sélectionnés
        jQuery('#lm_projet_pays_selectionnes').submit(function (e) {
            e.stopPropagation();
            e.preventDefault();

            let formData = new FormData();
            formData.append("action", "choix_pays");
            formData.append("security", lmprojetscript.security);

            jQuery('#lm_projet_pays_selectionnes').find('input, select').each(function (i) {
                let id = jQuery(this).attr("id");
                if (typeof id !== "undefined") formData.append(id, jQuery(this).val());
            });
            var userid = window.location.href.slice(window.location.href.indexOf('=')).split('=')[1];
            formData.append('lastId', userid);

            console.log(userid);


            jQuery('#loading').show();



            jQuery.ajax(
                {
                    url: lmprojetscript.ajax_url,
                    xhrFields:
                        {
                            withCredentials: true,
                        },
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    type: "post",
                    success: function (rs, textStatus, jqXHR) {
                        window.sessionStorage.setItem("Authorisation", "step1,step2,step3");
                        // on utilise le chemin de l'article créé avec le shortcode [FORMULAIRE_FINAL]
                        window.location.replace("http://localhost/wordpress/2023/04/03/formulaire-final/?id="+userid);
                        return false;
                    },
                });
        });
});