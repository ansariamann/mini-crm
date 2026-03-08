<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Edit Company {{$company->name}}</h1>
  @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form action="{{route('company.update', ['company' => $company->id])}}" method="POST">
    @csrf
    @method('PUT')
    <label >Name:</label>
    <input type="text" id="name" name="name" placeholder="name" value="{{ $company->name }}" required><br><br>

    <label >email:</label>
    <input type="text" id="email" name="email" placeholder="email" value="{{ $company->email }}" required><br><br>

    <label >logo:</label>
    <input type="text" id="logo" name="logo" placeholder="logo" value="{{ $company->logo }}" required><br><br>

    <label >Website:</label>
    <input type="text" id="website" name="website" placeholder="website" value="{{ $company->website }}" required><br><br>


    <button type="submit">Update Company</button>
  </form>
  
</body>
</html>
