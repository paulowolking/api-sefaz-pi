<?php
/**
 * Created by PhpStorm.
 * User: wellington
 * Date: 2019-03-17
 * Time: 23:28
 */

namespace App\Notifications;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;

class EmailRecipient
{
    use Notifiable;

    /**
     * @var array
     */
    private $emails;

    public function __construct($emails = [])
    {
        $this->emails = $emails;
    }

    public function routeNotificationForMail($notification)
    {
        return $this->emails;
    }
}