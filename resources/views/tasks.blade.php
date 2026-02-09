<div>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @foreach ($tasks as $task)
        <div>
            Name : {{ $task->name }}

            Completed_at : {{ var_dump($task->completed_at) }}

            <form action="/tasks/{{ $task->id }}" method="POST">
                @method('DELETE')
                @csrf

                <a href="/tasks/{{ $task->id }}/edit">Edit</a>
                <button type="submit">Delete</button>
            </form>

            <form action="/tasks/{{ $task->id }}/markAsCompleted" method="POST">
                @csrf

                <button type="submit">markAsCompleted</button>
            </form>

            <form action="/tasks/{{ $task->id }}/markAsNotCompleted" method="POST">
                @csrf

                <button type="submit">markAsNotCompleted</button>
            </form>
        </div>
    @endforeach

    <form method="POST" action="/tasks">
        @csrf
        <input name="name" />
        <button type="submit">Create</button>
    </form>
</div>
