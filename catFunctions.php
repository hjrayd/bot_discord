<?php 

require 'vendor/autoload.php';
require 'catModel.php';


function adoptCat($message) {
    $userId = $message->author->id;
    $username= $message->author->username;

    if (CAtModel::letCatExist($userId)) {
        $message->channel->sendMessage("Vous avez déjà adopter un chat");
        return;

    } 
        $args = explode(" ", $message->content);
    if (count($args) < 2) {
        $message->channel->sendMessage("Donnez un nom à votre chat. Utilisez `!adopt <nom>`.");
        return;
    }

    $nameCat = implode(" ", array_slice($args, 1)); 
    CatModel::adoptCat($userId, $username, $catName);
    $message->channel->sendMessage("Félicitations $username, vous avez adopté **$catName** 🐾 !");
}
    


function feedCat($message) {
    $userId = $message->author->id;

    if (!CatModel::letCatExist($userId)) {
        $message-> channel-> sendMessage("Vous n'avez pas encore adopté de chat. Utilisez la commande '!adopt' pour adopter votre premier chat ");
        return;
    } 

    CatModel::feedCat($userId);
    $message->channel->sendMessage("Vous avez nourri $catName. Votre niveau d'amitié a augmenté ! 😼");
}


    function playCat($message) {
        $userId = $message->author->id;

        if(!CatModel::letCatExist($userId)) {
        $message-> channel-> sendMessage("Vous n'avez pas encore adopté de chat. Utilisez la commande '!adopt' pour adopter votre premier chat ");
        return;
    } 

    CatModel::playCat($userId);
    $message->channel->sendMessage("Vous avez jouer avec $catName. Votre niveau d'amitié a augmenté ! 🧶🐈");

    }

    function petCat($message) {
        $userId = $message->author->id;

        if(!CatModel::letCatExist($userId)) {
        $message-> channel-> sendMessage("Vous n'avez pas encore adopté de chat. Utilisez la commande '!adopt' pour adopter votre premier chat ");
        return;
    } 

    CatModel::petCat($userId);
    $message->channel->sendMessage("Vous avez caresser $catName. Il ronronne ! 😸");

    }
