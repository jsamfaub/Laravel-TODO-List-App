<div>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @foreach ($tasks as $task)
        <div>
            Name : {{ $task->name }}
        </div>
    @endforeach
</div>
