<?php

require '/vendor/autoload.php';
use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;
use Discord\Parts\User\User;

require 'config.php';
require 'ChatModel.php';



$discord->on('ready', function ($discord) {
    echo "Bot is ready.", PHP_EOL;

    $discord->on('message', function (Message $message, Discord $discord) {
        if ($message->author->bot) {
            return;
        }

        $content = $message->content;

        if ($content = '!adopt') {
            adoptCat($message);
        }

        if ($content == '!feed') {
            feedCat($message);
        }

        if ($content == '!play') {
            playCat($message);
        }

        if ($content == '!pet') {
            petCat($message);
        }

        if ($content == '!friendship') {
            seeFriendship($message);
        }
    });
});

$discord->run();
