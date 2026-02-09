<div>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @foreach ($tasks as $task)
        <div>
            Name : {{ $task->name }}

            <form action="/tasks/{{ $task->id }}" method="POST">
                @method('DELETE')
                @csrf

                <a href="/tasks/{{ $task->id }}/edit">Edit</a>
                <button type="submit">Delete</button>
            </form>

            @if (is_null($task->completed_at))
                <form action="/tasks/{{ $task->id }}/markAsCompleted" method="POST">
                    @csrf

                    <button type="submit">Mark as completed</button>
                </form>
            @else
                <form action="/tasks/{{ $task->id }}/markAsNotCompleted" method="POST">
                    @csrf

                    <button type="submit">Mark as not completed</button>
                </form>
            @endif
        </div>
    @endforeach

    <form method="POST" action="/tasks">
        @csrf
        <input name="name" />
        <button type="submit">Create</button>
    </form>
</div>
