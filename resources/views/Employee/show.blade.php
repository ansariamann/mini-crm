<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $employee->first_name }} {{ $employee->last_name }}</title>
</head>
<body>
    <h1>{{ $employee->first_name }} {{ $employee->last_name }}</h1>
    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>Phone:</strong> {{ $employee->phone }}</p>
    <p><strong>Company:</strong> {{ $employee->company->name ?? 'N/A' }}</p>
    
    @if($employee->profile_photo)
        <img src="{{ asset('storage/' . $employee->profile_photo) }}" alt="Profile Photo" width="100"><br>
    @endif

    <br>
    <a href="{{ route('employee.index') }}">Back to Employee List</a>
</body>
</html>
