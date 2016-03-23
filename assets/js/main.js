/**
 * Created by Balzrog on 02/03/2016.
 */

$(document).ready(function() {
    change_theme("#id_body");
});

function change_theme(elemnt)
{
    $.ajax({
        url : " http://localhost/codeIgniter/Actions/theme_portfolio"+"/"+window.location.pathname.split('/')[4],
        type : 'POST',
        dataType : 'html', // On désire recevoir du HTML
        success : function(code_html, statut){ // code_html contient le HTML renvoyé
            $("#id_body").css("background-color", code_html.split('/')[0]);
            $("#id_body").css("font-family", code_html.split('/')[1]);
        }
    });

    return;
}