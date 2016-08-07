@forelse($jobs as $job)
    @include('jobs.single', ['job' => $job])
@empty
    <p>{{ $text ?: 'There is not posted jobs yet.' }}</p>
@endforelse