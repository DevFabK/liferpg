<h1>Tasks</h1>

<a href="{{ route('tasks.create') }}">Create task</a>

<ul>
@foreach($tasks as $task)
    <li>
        {{ $task->title }} - XP: {{ $task->xp_reward }}

        @if(!$task->completed)
        <form method="POST" action="{{ route('tasks.complete', $task) }}">
            @csrf
            <button type="submit">Complete</button>
        </form>
        @else
            <span>Completed</span>
        @endif
    </li>
@endforeach
</ul>