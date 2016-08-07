<?php
namespace App\Mailers;

use App\RelevantMedia\Models\Job;
use App\RelevantMedia\Models\Role;
use App\User;

/**
 * Class JobMailer
 * @package App\Mailers
 */
class JobMailer extends Mailer
{

    /**
     * Email admins about new job posting
     * @param User $user
     * @param Job $job
     * @return mixed
     */
    public function newJob(User $user, Job $job)
    {
        $view = 'emails.new_job';
        $data = ['job' => $job , 'user' => $user];
        $subject = 'New job posted';
        $admins = User::byRole(Role::ADMIN)->get();

        return $this->sendTo($admins, $subject, $view, $data);
    }

    /**
     * Email user that his job has been moderated
     * @param User $user
     * @param Job $job
     * @return mixed
     */
    public function moderated(User $user, Job $job)
    {
        $view = 'emails.moderated';
        $data = ['job' => $job , 'user' => $user];
        $subject = 'New job posted';

        return $this->sendTo($user, $subject, $view, $data);
    }
}