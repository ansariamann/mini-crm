<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Create Company</h1>
  @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label >Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label >Email</label>
    <input type="text" id="last_name" name="last_name" required><br><br>


    <label >logo</label>
    
    <input type="file" id="logo" name="logo" accept="image/*" required><br><br>

    <label >Website:</label>
    <input type="text" id="website" name="website" required><br><br>
<!-- @php

    $company_id= random_int(1000,9999);
@endphp
    <input type="hidden" name="company_id" value="{{$company_id}}"><br><br> -->

    
        

    
    <button type="submit">Create</button>
  </form>
  
</body>
</html>