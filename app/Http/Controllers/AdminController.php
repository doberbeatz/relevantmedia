<?php
namespace App\Http\Controllers;

use App\RelevantMedia\Models\Job;

class AdminController extends Controller
{

    /**
     * Return Index Page of Admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::byUnmoderated()->orderBy('created_at', 'desc')->get();

        return view('admin.index', compact('jobs'));
    }

    /**
     * Return All jobs
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get();

        return view('admin.index', compact('jobs'));
    }
}