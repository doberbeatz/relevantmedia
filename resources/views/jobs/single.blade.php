<div class="panel panel-info">
    <div class="panel-body">
        <h2>{{ $job->getName() }}</h2>
        <span>{{ $job->employer->getName() }}</span> |
        <span style="color: #555;"><a href="mailto:{{ $job->employer->getEmail() }}">Send email</a></span><br>
        @if(!$job->isModerated())
            <p><span class="label label-danger">Not moderated yet</span></p>
        @endif
        <p>
            @if(Auth::check())
                @if($job->hasAccess())
                    <a href="{{ route('jobs.edit', ['job_id'=>$job->getKey()]) }}"
                       class="btn btn-info">Edit</a>

                    {!! Form::open(['route' => [ 'jobs.update', $job->getKey()],
                        'method' => 'delete', 'style'=>'display:inline']) !!}
                    <button class="btn btn-danger" type="submit">Delete</button>
                    {!! Form::close() !!}

                    @if(!$job->isVisible())
                        <a href="{{ route('jobs.visible.toggle', ['job_id'=>$job->getKey()]) }}"
                           class="btn btn-default">Set visible</a>
                    @else
                        <a href="{{ route('jobs.visible.toggle', ['job_id'=>$job->getKey()]) }}"
                           class="btn btn-success">Set unvisible</a>
                    @endif
                @endif
                @if(Auth::user()->isAdmin() && !$job->isModerated())
                    <a href="{{ route('jobs.activate', ['job_id'=>$job->getKey()]) }}"
                       class="btn btn-default">Activate</a>
                @endif
            @else

            @endif
        </p>
    </div>
    <div class="panel-footer">{!! nl2br(htmlspecialchars($job->getDescription())) !!}</div>
</div>