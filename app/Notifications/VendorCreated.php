<?php

namespace App\Notifications;

use App\Models\Vendor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VendorCreated extends Notification
{
    use Queueable;

    public $vendor;
   
    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;    
    }//end construct

    
    public function via($notifiable)
    {
        return ['mail']; // mail, sms, database,slack
    }//end via

   
    public function toMail($notifiable)
    {
        $subject = sprintf('%s: You\'ve got a new message from %s!', config('app.name'),$this->vendor->name);
        $greeting = sprintf('Hello %s!',$notifiable->name);
        return (new MailMessage)
                    ->subject( $subject)
                    ->greeting( $greeting )
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }//end to mail

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }//end  to array
}// end vendor created notification
