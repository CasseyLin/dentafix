<?php
use App\BotMan\Conversations\OnboardingConversation;
$botman = app('botman');
$botman->hears('.*(hi|hey|hello|halo|aloha).*', function($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('hello');
});
$botman->hears('.*Bonjour.*', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Nice to meet you!');
});
$botman->hears('Hello', function($bot) {
    $bot->typesAndWaits(1);
    $bot->startConversation(new OnboardingConversation);
});
$botman->hears('single response', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply("Tell me more!");
});
$botman->hears('multi response', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply("Tell me more!");
    $bot->reply("And even more");
});
$botman->hears('My First Message', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Your First Response');
});
$botman->hears('foo', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Hello World');
});
$botman->hears('call me {name}', function ($bot, $name) {
    $bot->typesAndWaits(1);
    $bot->reply('Your name is: '.$name);
});
$botman->hears('call me {name} the {adjective}', function ($bot, $name, $adjective) {
    $bot->typesAndWaits(1);
    $bot->reply('Hello '.$name.'. You truly are '.$adjective);
});
$botman->hears('image attachment', function ($bot) {
    // Create attachment
    $attachment = new BotMan\BotMan\Messages\Attachments\Image('https://botman.io/img/logo.png');
    // Build message object
    $message = BotMan\BotMan\Messages\Outgoing\OutgoingMessage::create('This is my text')
                ->withAttachment($attachment);
                $bot->typesAndWaits(1);
    // Reply message object
    $bot->reply($message);
});
$botman->hears('I want ([0-9]+)', function ($bot, $number) {
    $bot->typesAndWaits(1);
    $bot->reply('You will get: '.$number);
});
$botman->hears('I want ([0-9]+) portions of (Cheese|Cake)', function ($bot, $amount, $dish) {
    $bot->typesAndWaits(1);
    $bot->reply('You will get '.$amount.' portions of '.$dish.' served shortly.');
});
$botman->hears('.*(reserve|reservation|booking|appointment|book).*', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply ('1. Head to the main page of the DentaFix.
                 2. Click book appointment. 
                 3. Choose the preferred timeslot for your appointment.
                 4. You will receive an email regarding the details of your booking.');
});
$botman->hears('logo', function ($bot) {
    // Create attachment
    $attachment = new BotMan\BotMan\Messages\Attachments\Image('https://botman.io/img/logo.png');
    // Build message object
    $message = BotMan\BotMan\Messages\Outgoing\OutgoingMessage::create('This is my text')
                ->withAttachment($attachment);
    // Reply message object
    $bot->typesAndWaits(1);
    $bot->reply($message);
});
$botman->hears('quiz',function($bot){
    $bot->typesAndWaits(1);
    $bot->startConversation(new OnboardingConversation);
});

$botman->hears('.*(history of appointment|appointment history|reservation history).*', function($bot){
    $bot->typesAndWaits(1);
    $bot->reply('1.Log in to your account. 2.View "My Appointments" 3.You will get the details of your appointment
    and the status of your visit ');
});
$botman->hears('stop',function($bot){
    $bot->reply('The conversation has ended!');
    $bot->reply('You can proceed to the next enquiries now if you want😊');
})->stopsConversation();

$botman->fallback(function($bot) {
    $message = $bot->getMessage();
    $bot->reply('Sorry, I do not understand "'.$message->getText().'" 😅');
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
    $bot->reply('quiz,reserve');
});