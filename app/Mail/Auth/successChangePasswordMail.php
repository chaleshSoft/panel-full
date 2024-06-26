<?php

namespace App\Mail\Auth;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class successChangePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function build()
    {
        return $this->markdown('mail.auth.success-change-password')->
        subject('https://amirrezaraadi.ir/');
    }

}
