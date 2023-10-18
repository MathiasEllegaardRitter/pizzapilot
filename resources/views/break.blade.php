@if($break)

<div>

    <form action="{{ route('breaks.update') }}" method="post">

        @csrf

        <input type="hidden" name="break_id" value="{{ $break->id }}">

        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ $break->name }}" required>

        <label for="startTime">Start Time:</label>
        <input type="datetime-local" class="form-control" name="startTime" value="{{ $break->startTime }}" required>

        <label for="endTime">End Time:</label>
        <input type="datetime-local" class="form-control" name="endTime" value="{{ $break->endTime }}" required>

        <label for="reason">Reason:</label>
        <textarea class="form-control" name="reason" value="{{ $break->endTime }}" required></textarea>

        <label for="description">Description:</label>

        <textarea name="description" required>{{ $break->description }}</textarea>

   

        <button type="submit">Update break</button>

    </form>

<div>

 

@else

<h1>No break was found<h1>

@endif