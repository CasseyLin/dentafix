<?php
namespace App\BotMan\Conversations;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
class OnboardingConversation extends Conversation
{
    protected $firstname;
    protected $email;
    public function askFirstname()
    {
        $this->ask('Hello! What is your firstname?', function(Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();
            $this->say('Nice to meet you '.$this->firstname);
            $this->askEmail();
        });
    }
    public function askEmail()
    {
        $this->ask('One more thing - what is your email?', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();
            $this->say('Great - that is all we need, '.$this->firstname);
        });
    }
    public function run()
    {
        // This will be called immediately
        $this->say('Hello');
        $this->ask('What is your name?', function($answer){
            $value = $answer->getText();
            if (trim($value)==='3'){
                $this->say('Hmm...this does not look like a valid name');
                return $this->repeat();
            }
            $this->name = $value;
            $this->say('Nice to meet you '.$value);
        });
    }
}
