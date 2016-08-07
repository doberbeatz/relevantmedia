<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Mailers\JobMailer;
use App\RelevantMedia\Models\Job;
use Illuminate\Http\Request;
use Auth;
use Validator;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class JobsController extends Controller
{

    /**
     * @var JobMailer
     */
    protected $mailer;

    /**
     * JobsController constructor.
     * @param JobMailer $jobMailer
     */
    public function __construct(JobMailer $jobMailer)
    {
        $this->mailer = $jobMailer;
    }

    /**
     * Profile Index Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::byAvailable()->orderBy('created_at', 'desc')->get();

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show info about single job
     * @param $jobId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($jobId)
    {
        $job = Job::find($jobId);

        return view('jobs.show', compact('job'));
    }

    /**
     * Page for create Job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Save Job
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $job = new Job();
        $job->name = $request->get('name');
        $job->description = $request->get('description');
        $job->is_visible = boolval($request->get('visible'));
        $job->user_id = \Auth::user()->getKey();
        $job->save();
        $this->mailer->newJob(\Auth::user(), $job);

        return redirect()->route('profile');
    }

    /**
     * Update Job
     * @param Request $request
     * @param $jobId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($jobId)
    {
        $job = Job::find($jobId);

        return view('jobs.edit', compact('job'));
    }

    /**
     * @param Request $request
     * @param int $jobId
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $jobId)
    {
        $job = Job::find($jobId);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $job->name = $request->get('name');
        $job->description = $request->get('description');
        $job->is_visible = boolval($request->get('visible'));
        $job->save();

        return redirect()->back();
    }

    /**
     * Delete Job
     * @param int $jobId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($jobId)
    {
        $job = Job::find($jobId);

        if ($job) {
            $job->delete();
        }

        return redirect()->back();
    }

    /**
     * Activate unmoderated jobs
     * @param $jobId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate($jobId)
    {
        $job = Job::find($jobId);
        $job->is_moderated = 1;
        $job->save();
        $this->mailer->moderated($job->employer, $job);

        return redirect()->route('admin.index');
    }

    /**
     * Visible unmoderated jobs
     * @param $jobId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleVisible($jobId)
    {
        $job = Job::find($jobId);
        if ($job->isVisible()) {
            $job->is_visible = 0;
        } else {
            $job->is_visible = 1;
        }
        $job->save();

        return redirect()->back();
    }
}
