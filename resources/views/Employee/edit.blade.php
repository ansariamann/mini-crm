<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Edit Employee</h1>
  @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form action="{{route('employee.update', $employee->id)}}" method="POST">
    @csrf
    @method('PUT')
    <label >First Name:</label>
    <input type="text" id="first_name" name="first_name" placeholder="firstname" value="{{ $employee->first_name }}" required><br><br>

    <label >Last Name:</label>
    <input type="text" id="last_name" name="last_name" placeholder="lastname" value="{{ $employee->last_name }}" required><br><br>

    <label >Email:</label>
    <input type="email" id="email" name="email" placeholder="email" value="{{ $employee->email }}" required><br><br>

    <label >Phone:</label>
    <input type="text" id="phone" name="phone" placeholder="phone" value="{{ $employee->phone }}" required><br><br>

    <label >Company:</label>
    <select name="company_id" id="company_id" required>
        <option value="">select</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
    </select><br><br>
        

    
    <button type="submit">Update Employee</button>
  </form>
  
</body>
</html>
