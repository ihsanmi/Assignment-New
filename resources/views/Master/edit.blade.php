
<html>
    <head>
    <h1>Edit Product</h1>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    @foreach($data as $data)
<form action="/updateproduct/{{$data->id}}"  method="post"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div >
    <div class="col">
      <div class="form-outline">
    <label value="Name" class="form-check-label" for="form6Example8">Name</label>
        
    <input type="text" name="name" class="form-control" value="{{$data->name}}">
    </div>
    
    </div>
    <div class="col">
      <div class="form-outline">
    <label value="Image" class="form-check-label" for="form6Example8">Image</label>

        
    <input type="file" name="image" accept="image/*" class="form-control" value="{{$data->price}}">
    <img src="{{ asset('public/storage/' . $data->image) }}" style="height: 100px; width: 150px;">
    
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <label value="Price" class="form-check-label" for="form6Example8">Price</label>
        
    <input type="Number" name="price" class="form-control" value="{{$data->price}}">
    </div>

  <!-- Text input -->
  <div class="form-outline mb-4">

    <label value="Status">Status</label>

        <select name="status">
        <option >{{$data->status}}</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
        </select>
        </div>


    <input type="submit" class="btn btn-primary btn-block mb-4" value="Update" >
    @endforeach
</form>
<a href="{{url('logout/')}}"  class="btn btn-secondary">Logout</a>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>