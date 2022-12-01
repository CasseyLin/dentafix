<?php
use App\BotMan\Conversations\OnboardingConversation;
$botman = app('botman');
$botman->hears('.*(hey|halo|aloha).*', function($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('hello');
});
$botman->hears('.*Bonjour.*', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Nice to meet you!');
});
$botman->hears('hello', function($bot) {
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
$botman->hears('.*who are you*.',function ($bot) {
    // Create attachment
    $attachment = new BotMan\BotMan\Messages\Attachments\Image('https://botman.io/img/logo.png');
    // Build message object
    $message = BotMan\BotMan\Messages\Outgoing\OutgoingMessage::create('This is me!')
                ->withAttachment($attachment);
                $bot->typesAndWaits(1);
    // Reply message object
    $bot->reply($message);
});

$botman->hears('I want ([0-5]+) number of dentists', function ($bot, $amount) {
    $bot->typesAndWaits(1);
    $bot->reply('You will get '.$amount.' dentists in DentaFix!');
});
$botman->hears(('.*(reserve|book).*'), function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply ('🤖 <br> 1. Head to the main page of the DentaFix. <br>
                 2. Click book appointment. <br>
                 3. Choose the preferred timeslot for your appointment. <br>
                 4. You will receive an email regarding the details of your booking. <br>');
});


$botman->hears('.*(history of appointment|appointment history|reservation history).*', function($bot){
    $bot->typesAndWaits(1);
    $bot->reply('🤖 <br> 1.Log in to your account. <br> 2.View "My Appointments"<br> 
    3.You will get the details of your appointment
    and the status of your visit <br>');
});

$botman->hears('.*(cancel|cancellation of booking).*', function($bot){
    $bot->typesAndWaits(1);
    $bot->reply('🤖 <br> 1.Log in to your account. <br> 2.View "My Appointments" <br> 
    3.You will get the details of your appointment and the status of your visit <br> 
    4.If you have not visited DentaFix, you can make your booking cancellation <br> 5.If you have
    visited DentaFix, the option for cancellation of booking will not be shown <br>');
});

$botman->hears('.*(service|dental service).*', function($bot){
    $bot->typesAndWaits(1);
    $bot->reply('🤖There are a total of  7 services provided in DentaFix. <br><br> 1. Dental whitening <br> 
    2. Dentures <br> 3. Dental treatment <br> 
    4. Dental Implant <br> 5. Braces <br> 6. Dental fillings <br> 7. Dental surgery <br>');
});

$botman->hears('.*(prescription).*', function($bot){
    $bot->typesAndWaits(1);
    $bot->reply('🤖 To get the prescription details, you must first visit the dentist. If you have visited the dentist,
     <br><br> 1.Log in to your account. <br> 2.View "My Prescriptions".<br> 
     3.You will get the details of your appointment
     along with the prescription details written by the dentist. <br>');
});

$botman->hears('.*(settings|profile).*', function($bot){
    $bot->typesAndWaits(1);
    $bot->reply('🤖 To perform settings on your profile,<br><br>
    1.Log in to your account. <br> 2.At the top right corner, choose "Profile" option.<br> 
    3.You will see "User Profile", "Profile Information", "User Image" as well as "Dental Image".<br>
    4.The "User Profile" shows the latest information stored in the system, while you can edit the details 
    on the other sections.<br> 5. You can also update your dental image before visiting the dentist!<br>
    6. The updated information will be shown at the left which is "User Profile" section. <br>'
     );
});

$botman->hears('.*(cannot).*', function($bot){
    $bot->typesAndWaits(1);
    $bot->reply('🤖 In case you are unable to book,<br><br>
    The only reason is because you have previously performed a booking, which is within 24 hours.<br>
    DentaFix aims to provide equal chances for the users to book per day.<br>
    You may wait for another 24 hours if you would like to perform booking again.<br>
    See you later in DentaFix!😁 <br>'
     );
});

$botman->hears('.*(tips|care|dental health).*', function($bot){
    $bot->typesAndWaits(1);
    $bot->reply('🤖 To maintain good oral health,<br><br>
    😁Drink fluoridated water and brush with fluoride toothpaste.<br><br>
    😁Practice good oral hygiene. Brush teeth thoroughly twice a day and floss daily between the teeth to remove dental plaque. <br><br>
    😁Visit your dentist at least once a year, even if you have no natural teeth or have dentures. <br><br>
    😁Do not use any tobacco products. If you smoke, quit. <br><br>
    😁Limit alcoholic drinks. <br><br>
    😁If you have diabetes, work to maintain control of the disease. This will decrease risk for other complications, including gum disease. Treating gum disease may help lower your blood sugar level. <br><br>
    😁If your medication causes dry mouth, ask your doctor for a different medication that may not cause this condition. If dry mouth cannot be avoided, drink plenty of water, chew sugarless gum, and avoid tobacco products and alcohol. <br><br>
    😁See your doctor or a dentist if you have sudden changes in taste and smell. <br><br>
    😁When acting as a caregiver, help older individuals brush and floss their teeth if they are not able to perform these activities independently. <br>'
     );
});

$botman->hears('.*(live agent|agent).*', function($bot){
    $bot->reply('🤖 Currently, live agent function is not supported. You may contact us at +6043838019 for more enquiries. <br>
    I am truly sorry for the inconveniences caused. Have a nice day!');
});

$botman->hears('.*(pain|toothache).*', function($bot){
    $bot->reply('🤖 The pulp inside your tooth is soft material filled with nerves, tissues and blood vessels. These pulp nerves are among the most sensitive in your body. <br>
    When these nerves are irritated or infected by bacteria, they can cause severe pain.<br><br>
    During this time try not to chew around the affected area. Eat soft foods, like eggs and yogurt, and avoid sweets and very hot or very cold foods if teeth are sensitive.<br><br>
    You can rinse with warm saltwater. Saltwater can loosen debris between your teeth, act as a disinfectant and reduce inflammation. Stir a ½ teaspoon of salt into a glass of warm water and rinse your mouth thoroughly.<br><br>
    In addition, you can Cold compress. For swelling and pain hold a cold compress of ice wrapped in a towel to the painful area for 20-minute periods. Repeat every few hours.<br><br>
    While the pain is getting serious, Pain medications. Over-the-counter pain medications can reduce pain and inflammation. NSAIDs (nonsteroidal anti-inflammatory drugs) such as aspirin, ibuprofen (Motrin®, Advil®) and naproxen (Aleve®) 
    can be used, or take acetaminophen (Tylenol®) if you can’t take NSAIDs. Don’t give a child under the age of 16 aspirin; use Tylenol instead.<br>');
});

$botman->hears('.*recover.*', function($bot){
    $bot->reply('🤖 Rest the day of your oral surgery. <br>
    Take Your Meds As Instructed. <br>
    Maintain a Clean Mouth. <br>
    Do not Exert Yourself. <br>
    Do not Eat Hard or Crunchy Foods. <br>
    Do not Smoke for 24 Hours.<br>');
});

$botman->hears('.*hours*', function($bot){
    $bot->reply('🤖 DentaFix operates at 8a.m. to 9p.m.. However, it is all depend on the dentists schedules.<br>
    You may check for the available timeslots for certain days at the homepage.😊');
});

$botman->hears('stop',function($bot){
    $bot->reply('The conversation has ended!');
    $bot->reply('You can proceed to the next enquiries now if you want😊');
})->stopsConversation();

$botman->fallback(function($bot) {
    $message = $bot->getMessage();
    $bot->reply('Sorry, I do not understand "'.$message->getText().'" 😅');
    $bot->reply('Perhaps you can ask for other questions? I will try my best to help you~🤖');

});

