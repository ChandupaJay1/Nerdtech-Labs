<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormSubmitted extends Notification
{
    use Queueable;

    public $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact Form Submission - ' . config('app.name'))
            ->greeting('New Contact Inquiry')
            ->line('You have received a new contact form submission.')
            ->line('**Name:** ' . $this->contact->first_name . ' ' . $this->contact->last_name)
            ->line('**Email:** ' . $this->contact->email)
            ->line('**Phone:** ' . $this->contact->phone)
            ->line('**Company:** ' . ($this->contact->company ?? 'N/A'))
            ->line('**Message:**')
            ->line($this->contact->message)
            ->line('Submitted at: ' . $this->contact->created_at->format('F j, Y, g:i a'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
