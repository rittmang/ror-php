<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class UserEventNotification extends Notification
{
    use Queueable;
    private $userEvent;

    public function __construct($userEvent)
    {
        $this->userEvent = $userEvent;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    
    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->to($notifiable->telegram_user_id)
            ->content("Dear ".$notifiable->name.",\n".$this->userEvent['body']);
    }

}
