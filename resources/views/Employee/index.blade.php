<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee index</title>
  <style>
    table { width: 100%; }
    th, td { padding: 15px; }
  </style>
</head>
<body>

<div>
  <a href="{{route('employee.create')}}">create an employee</a>
  <h1>Employee index</h1>
  <table border="1">
    <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Company</th>
  <th>Edit</th>
  <th>Delete</th>

  @foreach($employees as $employee)
  

    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $employee->first_name }}</td>
      <td>{{ $employee->last_name }}</td>
      <td>{{ $employee->email }}</td>
      <td>{{ $employee->phone }}</td>
      <td>{{ $employee->company->name }}</td>
      
      <td><a href="{{route('employee.edit',['employee'=>$employee])}}">Edit</a></td>
      <td>
        <form action="{{route('employee.destroy',['employee'=>$employee])}}" method='post'>
          @csrf
          @method("DELETE")
          <input type="submit" value="Delete">
</form>
</td>

    </tr>
  @endforeach
  </table>
</body>
</html>