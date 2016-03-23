/**
 * Created by OGC on 21/03/2016.
 */
function is_firstname(myVar){
    var regex = /^[a-zA-Z]+$/;
    if (regex.test(myVar.value)){
        change_background_color_white(form_register.firstname);
    }else{
        alert("Veuillez entrer un prénom valide");
        change_background_color_red(form_register.firstname);
    }
}

function is_phone(myVar){
    var regex = /^0[1-68][0-9]{8}$/;
    if (regex.test(myVar.value)){
        change_background_color_white(form_register.phone);
    }else{
        alert("Numéro invalide");
        change_background_color_red(form_register.phone);
    }
}

function is_password(myVar){
    var regex = /(?=.{6,}).*/;
    if (regex.test(myVar.value)){
        change_background_color_white(form_register.password);
    }else{
        alert("Votre mot de passe doit avoir une taille minimum de 6 caractères");
        change_background_color_red(form_register.password);
    }
}

function is_password_bis(myVar){
    if (myVar.value == form_register.password.value){
        change_background_color_white(form_register.passwordbis);
    }else{
        alert("Veuillez reconfirmer votre mot de passe");
        change_background_color_red(form_register.passwordbis);
    }
}

function is_email(myVar){
    var regex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;

    if(regex.test(myVar.value)){
        change_background_color_white(form_register.mail);
    }
    else{
        alert("Erreur de saisie");
        change_background_color_red(form_register.mail);
    }
}

function is_zipcode(myVar){
    var regex = /^(2[ab]|0[1-9]|[1-9][0-9])[0-9]{3}$/;
    if(regex.test(myVar.value)){
        change_background_color_white(form_register.zipcode);
    }else{
        alert("Erreur de saisie");
        change_background_color_red(form_register.zipcode);
    }
}

function is_town(myVar){
    var regex = /[a-zéèêëàâîïôöûü-]+/i;
    if(regex.test(myVar.value)){
        change_background_color_white(form_register.city);
    }else{
        alert("Erreur de saisie");
        change_background_color_red(form_register.city);
    }
}