<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee index</title>
  <style>
    table { width: 100%; }
    th, td { padding: 15px; }
    .w-5 { width: 20px; }
    .h-5 { height: 20px; }
  </style>
</head>
<body>

<div>
  <h1>Employee index</h1>
  <a href="{{route('employee.create')}}">create an employee</a>
</div>
  <table border="1">
    <tr>
    <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Profile Picture</th>
  <th>Company</th>
  <th>Edit</th>
  <th>Delete</th>
    </tr>

  @foreach($employees as $employee)
  

    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $employee->first_name }}</td>
      <td>{{ $employee->last_name }}</td>
      <td>{{ $employee->email }}</td>
      <td>{{ $employee->phone }}</td>
      <td>
        @if($employee->profile_photo)
          <img src="{{ asset('storage/' . $employee->profile_photo) }}"  width=100px height=100px >
        @endif
      </td>
      <td>{{ $employee->company->name }}</td>
      
      <td><a href="{{route('employee.edit',['employee'=>$employee])}}">Edit</a></td>
      <td>
        <form action="{{route('employee.destroy',['employee'=>$employee])}}" method="POST">
          @csrf
          @method("DELETE")
          <input type="submit" value="Delete">
</form>
</td>

    </tr>
  @endforeach
  </table>
  {{ $employees->links() }}
</body>
</html>