<?php
namespace App\BotMan\Conversations;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
class OnboardingConversation extends Conversation
{

    public function run()
    {
        // This will be called immediately
        $this->say('Hello');
        $this->ask('What is your name?', function($answer){
            $value = $answer->getText();
            if (trim($value)===''){
                $this->say('Hmm...this does not look like a valid name');
                return $this->repeat();
            }
            $this->name = $value;
            $this->say('Nice to meet you '.$value);

        });
    }
}