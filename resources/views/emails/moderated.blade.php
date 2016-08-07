<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>Your job has been moderated!</h1>

        <p>Hello, {{ $user->getName() }}!
           Your posted job: "{{ $job->getName() }}" has been activated by moderators.
        </p>
        <p>Here is <a href="{{ route('jobs.show', ['jobs'=>$job->getKey()]) }}">link</a></p>
    </body>
</html>