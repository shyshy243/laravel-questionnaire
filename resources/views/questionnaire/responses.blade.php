<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submitted Answers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .user-container {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .user-container h3 {
            margin-bottom: 15px;
        }
        table th, table td {
            vertical-align: middle;
            width: 50%; 
        }
        table {
            table-layout: fixed; 
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Submitted Answers</h1>

    @php
        $groupedAnswers = $answers->groupBy('user_name');
    @endphp

    @foreach ($groupedAnswers as $user => $userAnswers)
        <div class="user-container">
            <h3>User: {{ $user }}</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userAnswers as $answer)
                        <tr>
                            <td>{{ $answer->question->text }}</td>
                            <td>{{ $answer->answer_text }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
</body>
</html>
