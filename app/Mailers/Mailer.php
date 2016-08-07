<?php
namespace App\Mailers;

use Illuminate\Database\Eloquent\Collection;

abstract class Mailer {

    /**
     * @param array|\App\User $user
     * @param string $subject
     * @param string $view
     * @param array $data
     * @return mixed
     */
    public function sendTo($user, $subject, $view, $data = [])
    {
        if (is_array($user)||is_a($user, Collection::class)) {
            $address = [];
            foreach ($user as $singleUser) {
                $address[] = $singleUser->getEmail();
            }
        } else {
            $address = $user->getEmail();
        }

        return \Mail::send($view, $data, function($message) use ($user, $subject, $address) {
            $message->to($address)
                    ->subject($subject);
        });
    }
}