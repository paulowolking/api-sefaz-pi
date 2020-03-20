<?php

namespace App\Notifications;

use Benwilkins\FCM\FcmMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class GenericNotification extends Notification
{
    use Queueable;

    private $title;
    private $message;
    private $channels;
    private $action;
    private $params;
    private $link;
    private $broadcast;

    /**
     * GenericNotification constructor.
     * @param $title
     * @param $message
     * @param $channels
     * @param $action
     * @param $params
     * @param $link
     * @param $broadcast
     */
    public function __construct($title, $message, $channels, $action, $params, $link, $broadcast)
    {
        $this->title = $title;
        $this->message = $message;
        $this->channels = $channels;
        $this->action = $action;
        $this->params = $params;
        $this->link = $link;
        $this->broadcast = $broadcast;
    }

    /**
     * Static constructor / factory
     */
    public static function create($title, $message) {
        $instance = new self($title, $title, ['fcm'], null, null, null, null);
        return $instance;
    }

    /**
     * @param mixed $channels
     * @return GenericNotification
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
        return $this;
    }

    /**
     * @param mixed $action
     * @return GenericNotification
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @param mixed $params
     * @return GenericNotification
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @param mixed $link
     * @return GenericNotification
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @param mixed $broadcast
     * @return GenericNotification
     */
    public function setBroadcast($broadcast)
    {
        $this->broadcast = $broadcast;
        return $this;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $this->channels ?: ['mail','fcm','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->subject($this->title)
            ->line($this->message);

        if (isset($this->link)) {
            $mail->action('Visualizar', url($this->link));
        }

        return $mail;
    }

    /**
     * Get the fcm representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return FcmMessage
     */
    public function toFcm($notifiable)
    {
        $message = new FcmMessage();
        $message->data([
            'title' => $this->title,
            'message' => $this->message,
            'action' => $this->action,
            'params' => $this->params,
            'link' => $this->link,
            'broadcast' => $this->broadcast
        ])->priority(FcmMessage::PRIORITY_HIGH); 

        if ($notifiable instanceof TopicRecipient) {
            $message->content([
                'title' => $this->title,
                'body'  => $this->message,
            ]);
        }
    
        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return in_array('fcm', $this->channels) ? (array) $this->toFcm($notifiable) : $this->message;
    }

}
