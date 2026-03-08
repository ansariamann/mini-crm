<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table { width: 100%; }
    th, td { padding: 15px; }
    /* Fix for giant pagination arrows */
    .w-5 { width: 20px; }
    .h-5 { height: 20px; }
  </style> 
  
</head>
<body>
  <h1>Mini CRM</h1>
  <a href="{{route('company.create')}}">create a company</a>
  <h2>Company List</h2>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Logo</th>
      <th>Website</th>
      <th>Employees</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach($companies as $company )
    <tr>
      <td>{{ ($companies->currentPage() - 1) * $companies->perPage() + $loop->iteration }}</td>
      <td>{{$company->name}}</td>
      <td>{{$company->email}}</td>
      <td>
        @if($company->logo)
        <img src="{{asset('storage/' . $company->logo)}}" alt="Logo" width="100">
        @endif
      </td>
      <td>{{$company->website}}</td>
      <td><a href="{{route('company.showEmployees',['company'=>$company->id])}}">view</a></td>


      <td><a href="{{route('company.edit',['company'=>$company])}}">Edit</a></td>
      <td>
        <form action="{{route('company.destroy',['company'=>$company])}}" method="POST">
          @csrf
          @method("DELETE")
          <input type="submit" value="Delete">
        </form>
      </td>
    </tr>
    @endforeach
  </table>
     <div style="width: 100%;">
       {{ $companies->links()}}
      </div>


  
</body>
</html>