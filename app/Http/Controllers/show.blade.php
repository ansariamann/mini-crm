<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }}</title>
</head>
<body>
    <h1>{{ $company->name }}</h1>
    <p><strong>Email:</strong> {{ $company->email }}</p>
    <p><strong>Website:</strong> {{ $company->website }}</p>

    <h2>Employees</h2>
    @if($company->employees->isNotEmpty())
        <ul>
            @foreach($company->employees as $employee)
                <li>{{ $employee->first_name }} {{ $employee->last_name }} ({{ $employee->email }})</li>
            @endforeach
        </ul>
    @else
        <p>No employees found for this company.</p>
    @endif

    <br>
    <a href="{{ route('companies.index') }}">Back to Company List</a>
</body>
</html>
