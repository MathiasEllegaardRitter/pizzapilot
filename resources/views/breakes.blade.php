<!DOCTYPE html>

<html>

<head>

    <title>Breakes List</title>

</head>

<body>
<div class="container mt-5">
    <h1>Breakes List</h1>

    <div class="card-columns">
        @foreach($breakes as $break)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $break->name }}</h5>
                    <p class="card-text">
                        <strong>Start Time:</strong> {{ $break->startTime }} <br>
                        <strong>End Time:</strong> {{ $break->endTime }} <br>
                        <strong>Reason:</strong> {{ $break->reason }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container mt-5">
    <h2>Create Break</h2>

    <form action="{{ route('breakes.create') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="startTime">Start Time:</label>
            <input type="datetime-local" class="form-control" name="startTime" required>
        </div>

        <div class="form-group">
            <label for="endTime">End Time:</label>
            <input type="datetime-local" class="form-control" name="endTime" required>
        </div>

        <div class="form-group">
            <label for="reason">Reason:</label>
            <textarea class="form-control" name="reason" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Break</button>
    </form>
</div>

</body>

</html>