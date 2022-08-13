<html>
<head>
<h1>Product List</h1>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
      </head>
      <body>
      
<a href="{{url('createproduct/')}}"  class="btn btn-success">Create Product</a>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  @foreach($data as $item)
  <tbody>
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td><img src="{{ asset('public/storage/' . $item->image) }}" style="height: 100px; width: 150px;"></td>
      <td>{{$item->price}}</td>
      <td>{{$item->status}}</td>
      <td><a href="editproduct/{{$item->id}}"  class="btn btn-warning">Edit</a></td>
      <td><form action="/deleteproduct/{{$item->id}}"  method="post">
    @csrf
    @method('delete')
    <button  class="btn btn-danger">Delete</button>
    </form></td>
    </tr>
    
  </tbody>
  @endforeach
</table>
<a href="{{url('logout/')}}"  class="btn btn-secondary">Logout</a>

</body>
</html>