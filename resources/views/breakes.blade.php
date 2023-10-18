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

<div>

    <h1>Find break</h1>

    <form action="{{ route('breakes.findBreak') }}" method="post">



        @csrf

        <label for="break_id">BreakId:</label>

        <input type="text" name="break_id" required>

        <button type="submit">Find Break</button>

    </form>

</div>

</body>

</html>