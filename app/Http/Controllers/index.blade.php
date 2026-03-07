<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company List</title>
</head>
<body>
    <h1>Companies</h1>
    <ul>
        @foreach($companies as $company)
            <li>
                <a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
