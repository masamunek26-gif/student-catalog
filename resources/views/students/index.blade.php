<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог студентов</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Каталог студентов</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-primary">Добавить студента</a>
    </div>

    @if($students->isEmpty())
        <p class="text-muted">Студентов пока нет</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>№</th>
                    <th>ФИО</th>
                    <th>Группа</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $index => $student)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->group_name }}</td>
                        <td>{{ $student->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>