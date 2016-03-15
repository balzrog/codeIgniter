/**
 * Created by Balzrog on 02/03/2016.
 */

$(document).ready(function() {
    refreshNavBar();
});

function refreshNavBar(){
   $(".navBar_item").removeClass("active");
    var fileName = returnFileName();
    var allDocs = $(".navBar_item");
    allDocs.children().each(function(){
        var kid = $(this);
        if(kid.attr("href") == fileName){
            kid.parent("li").addClass("active");
        }
    })
}

function returnFileName(){
    var fileName = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
    return fileName;
}

function addToCart(name,quantity,price){
    var dataString = {'action' : 'addToCart' , 'name' : name , 'quantity' : quantity , 'price' : price};
    $.ajax({
        url : 'actions.inc.php',
        type : 'POST',
        dataType : 'html',
        data : dataString,
        success : function(code_html, statut){
            alert(code_html);
        },

        error : function(resultat, statut, erreur){
            alert(erreur+"dzdzdzd "+resultat);
        }

    });
}

function delArticle(name){
    var dataString = {'action' : 'delArticle' , 'name' : name};
    $.ajax({
        url : 'actions.inc.php',
        type : 'POST',
        dataType : 'html',
        data : dataString,
        success : function(code_html, statut){
            alert(code_html);
        },

        error : function(resultat, statut, erreur){
            alert(erreur+"dzdzdzd "+resultat);
        }

    });
}

function removeEntry(nom,prenom){
    alert('preourt');
    var dataString = {'action' : 'removeEntry', 'nom' : nom, 'prenom' : prenom};
    $.ajax({
        url : 'http://localhost/codeIgniter/liste_d_appel/ListeAppel_action/action/',
        type : 'POST',
        dataType : 'html',
        data : dataString,

        error : function(resultat, statut, erreur){
            alert(erreur+"dzdzdzd "+resultat);
        }

    });
}
