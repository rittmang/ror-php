<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class AdminEventNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $adminEvent;

    public function __construct($adminEvent)
    {
        $this->adminEvent=$adminEvent;
    }
    
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }
 
    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
                ->to(config('admin.admin_channel'))
                ->content($this->adminEvent['body']." by ".$this->adminEvent['name']);
    }
}
