<?php

require 'config.php';

class ChatModel {

    public  function letCatExist($userId) {
        $pdo = getDbConnection();
        
        $stmt = $pdo->prepare('SELECT cat_adopt FROM cat WHERE user_id = ?');
        $stmt->execute([$userId]);
        
        $result = $stmt->fetch();
        
        return $result && $result['cat_adopt'] == 1;
    }

    public function adoptCat($userId, $username, $catName) {
        $pdo = getDbConnection();

        $stmt = $pdo->prepare('INSERT INTO chats (user_id, username, cat_name, adopt_cat, friendship) VALUES (?, ?, ?, 1, 0)');
        $stmt->execute([$userId, $username, $catName]);
    }

    public function feedCat($userId) {
    $pdo = getDbConnection();

    $stmt = $pdo->prepare('UPDATE cat SET last_interaction = NOW() WHERE user_id = ?');
    $stmt -> execute([$userId]);
}


}