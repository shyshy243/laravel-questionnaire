<!DOCTYPE html>
<html>
<head>
    <title>Simple Questionnaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="mb-4">Questionnaire</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('questionnaire.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_name" class="form-label">Your Name:</label>
            <input type="text" name="user_name" id="user_name" class="form-control" required>
        </div>

        @foreach($questions as $question)
            <div class="mb-3">
                <label class="form-label">
                    {{ $question->question ?? $question->text }}
                </label>
                <input type="text" name="answers[{{ $question->id }}]" class="form-control" required>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit Answers</button>
    </form>
</body>
</html>
