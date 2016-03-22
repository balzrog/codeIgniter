/**
 * Created by OGC on 22/03/2016.
 */

var body;

function theme_changer(){

    body = document.getElementById("id_body");

    $("#change_theme").click(function(){

        $.ajax({
            url : 'index.php/portfolio/p_change_theme',
            type : 'POST',
            dataType : 'html', // On désire recevoir du HTML
            success : function(code_html, statut){ // code_html contient le HTML renvoyé
            }
        });

    });

    body.style.backroundColor = "#FFFFFF";//parametre recupéré en bdd
    body.style.fontFamily =  "Calibri"; //parametre recupéré en bdd
}
