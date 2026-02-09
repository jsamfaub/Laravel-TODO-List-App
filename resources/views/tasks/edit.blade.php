<div>
    Edit
    <a href="/">Cancel</a>
    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('PUT')

        <input name="name" value="{{ $task->name }}" />
        <button type="submit">Update</button>
    </form>
</div>
