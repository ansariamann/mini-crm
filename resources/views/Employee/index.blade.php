<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee index</title>
</head>
<body>
  <h1>Employee index</h1>
  <table border="1">
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Company</th>

  @foreach($employees as $employee)
  

    <tr>
      <td>{{ $employee->first_name }}</td>
      <td>{{ $employee->last_name }}</td>
      <td>{{ $employee->email }}</td>
      <td>{{ $employee->phone }}</td>
      <td>{{ $employee->company->name }}</td>
    </tr>
  @endforeach
  </table>
</body>
</html>