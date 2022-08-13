
<html>
    <head>
    <h1>Create Product</h1>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
<form action="{{url('storeproduct//')}}"  method="post"  enctype="multipart/form-data">
    @csrf
    <div >
    <div class="col">
      <div class="form-outline">
    <label value="Name" class="form-check-label" for="form6Example8">Name</label>
        
    <input type="text" name="name" class="form-control">
    </div>
    </div>
    <div class="col">
      <div class="form-outline">
    <label value="Image" class="form-check-label" for="form6Example8">Image</label>
        
    <input type="file" name="image" accept="image/*" class="form-control">
    
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <label value="Price" class="form-check-label" for="form6Example8">Price</label>
        
    <input type="Number" name="price" class="form-control">
    </div>

  <!-- Text input -->
  <div class="form-outline mb-4">

    <label value="Status">Status</label>

        <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
        </select>
        </div>


    <input type="submit" class="btn btn-primary btn-block mb-4" >
    
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