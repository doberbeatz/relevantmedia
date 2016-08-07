<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>New job posted!</h1>

        <p>On our website {{ $user->getName() }} posted new job: "{{ $job->getName() }}".</p>
        <p><strong>Description:</strong></p>
        <p>{!! nl2br(htmlspecialchars($job->getDescription())) !!}</p>
        <hr>
        <p>Here is the <a href="{{ route('jobs.show', ['jobs'=>$job->getKey()]) }}">link</a> to activate, edit or
           delete</p>
        <p>You got to moderated it.</p>
    </body>
</html>