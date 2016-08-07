<?php

namespace App\Http\Controllers;

use App\RelevantMedia\Models\Job;
use App\Http\Requests;
use Auth;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{

    /**
     * @var \App\User
     */
    public $user;

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }


    /**
     * Profile Index Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::byUser($this->user->getKey())->orderBy('created_at', 'desc')->get();

        return view('profile.index', compact('jobs'));
    }
}
