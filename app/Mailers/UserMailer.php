<?php
namespace App\Mailers;

use App\User;

class UserMailer extends Mailer
{

    public function welcome(User $user)
    {
        $view = 'emails.welcome';
        $data = [];
        $subject = 'Welcome to Laracasts';

        return $this->sendTo($user, $subject, $view, $data);
    }
}