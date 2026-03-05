<h1>Create task</h1>

<form method="POST" action="{{ route('tasks.store') }}">
    @csrf

    <label>Title</label>
    <input name="title" required>

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>XP Reward</label>
    <input name="xp_reward" type="number" value="10" required>

    <label>Daily limit</label>
    <input name="daily_limit" type="number" value="1" required>

    <button type="submit">Save</button>
</form>