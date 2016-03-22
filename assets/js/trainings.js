/**
 * Created by Guillaume on 22/03/2016.
 */

/////////////////////////////////TRAININGS/////////////////////////////////

function sendCard() {
    var divCardLayout = '<div class="panel-heading" style="padding: 5px;"> <h3 class="panel-title panel-custom-title pull-left"></h3> <button class="btn btn-default training-edit"><i class="fa fa-pencil-square"></i></button> <button class="btn btn-default training-delete"><i class="fa fa-trash"></i></button> <button class="btn btn-default training-up-order"><i class="fa fa-arrow-up"></i></button> <button class="btn btn-default training-down-order"><i class="fa fa-arrow-down"></i></button> <div class="clearfix"></div> </div> <div class="panel-body"> <ul class="list-group" id="list-group-admin" style="margin-bottom: 0;"> <li class="list-group-item "><b>Diplôme :</b> <span class="training-data-diploma"></span></li> <li class="list-group-item"><b>Année :</b> <span class="training-data-year"></span></li> <li class="list-group-item"><b>Ville :</b> <span class="training-data-city"></span></li> <li class="list-group-item"> <b>Descriptif :</b> <br> <p class="training-data-details"></p> </li> <li class="training-data-visible none"> </li> <li class="training-data-order none"> </li> <li class="training-data-id none"> </li> </ul> </div>';
    var submitTrainingButton = document.querySelector('#submit_training');

    //var newCard = "";

    submitTrainingButton.addEventListener("click", function(e) {
        e.preventDefault();
        var cardsParent = document.querySelector('.panel-training');
        var newCard = document.createElement('div');
        newCard.className = "panel panel-primary training-cards";
        newCard.innerHTML = divCardLayout;
        cardsParent.appendChild(newCard);

        //Form
        var formTraining = document.querySelector("#add_training_form");

        //Card
        newCard.querySelector(".panel-custom-title").innerText = formTraining.training.value;
        newCard.querySelector(".training-data-diploma").innerText = formTraining.diploma.value;
        newCard.querySelector(".training-data-year").innerText = formTraining.year.value;
        newCard.querySelector(".training-data-city").innerText = formTraining.city.value;
        newCard.querySelector(".training-data-details").innerText = formTraining.details.value;
        newCard.querySelector(".training-data-visible").innerText = formTraining.visible.value;
        //newCard.querySelector(".training-data-order");


        var xhr = new XMLHttpRequest();
        var form = new FormData(formTraining);

        xhr.open("POST", "index.php/Administration/add_user_training");
        xhr.send(form);

        xhr.addEventListener("load", function(){
            newCard.querySelector(".training-data-id").innerText = xhr.responseText;
        }, false);


        for(var i = 0; i < formTraining.length; i++){
            formTraining.elements[i].value = "";
        }


        attachEventToCard(newCard);

    }, false);
}

function upCard(card) {
    var movedCard = card.cloneNode(true);
    attachEventToCard(movedCard);
    if(card.previousElementSibling) {
        card.parentNode.insertBefore(movedCard, card.previousElementSibling);
        card.parentNode.removeChild(card);
    }

}

function downCard(card) {
    var movedCard = card.cloneNode(true);
    attachEventToCard(movedCard);

    if(card.nextElementSibling) {
        card.parentNode.insertBefore(movedCard, card.nextElementSibling.nextSibling);
        card.parentNode.removeChild(card);
    }
}

function editCard(card) {
    var formTraining = document.querySelector("#add_training_form");
    var saveButton = document.querySelector('#save_button_form');

    formTraining.training.value = card.querySelector(".panel-custom-title").innerText;
    formTraining.diploma.value = card.querySelector(".training-data-diploma").innerText;
    formTraining.year.value = card.querySelector(".training-data-year").innerText;
    formTraining.city.value = card.querySelector(".training-data-city").innerText;
    formTraining.details.value = card.querySelector(".training-data-details").innerText;
    formTraining.id_training.value = card.querySelector(".training-data-id").innerText;

    saveButton.addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        var form = new FormData(formTraining);

        xhr.open("POST", "index.php/Administration/update_user_training");
        xhr.send(form);

        xhr.addEventListener("load", function() {
            console.dir(xhr.responseText);
        }, false);

        card.querySelector(".panel-custom-title").innerText = formTraining.training.value;
        card.querySelector(".training-data-diploma").innerText = formTraining.diploma.value;
        card.querySelector(".training-data-year").innerText = formTraining.year.value;
        card.querySelector(".training-data-city").innerText = formTraining.city.value;
        card.querySelector(".training-data-details").innerText = formTraining.details.value;
        card.querySelector(".training-data-id").innerText = formTraining.id_training.value;
    }, false);
}

function deleteCard(card) {
    var idTraining = card.querySelector(".training-data-id").innerText;

    var xhr = new XMLHttpRequest();
    var form = new FormData();
    form.append('id_training', idTraining);
    xhr.open("POST", "index.php/Administration/delete_user_training");
    xhr.send(form);

    xhr.addEventListener("load", function(){ console.dir(xhr.responseText) }, false);

    card.parentNode.removeChild(card);
}

function attachEventToCard(newCard) {
    newCard.querySelector(".training-up-order").addEventListener("click", function(){ upCard(newCard); }, false);
    newCard.querySelector(".training-down-order").addEventListener("click", function() { downCard(newCard); }, false);
    newCard.querySelector(".training-edit").addEventListener("click", function() { editCard(newCard); }, false);
    newCard.querySelector(".training-delete").addEventListener("click", function() { deleteCard(newCard); }, false);
}

function init() {
    sendCard();
    var allCards = document.querySelectorAll(".training-cards");
    for(var i = 0; allCards.length > i; i++) {
        attachEventToCard(allCards[i]);
    }
}

init();