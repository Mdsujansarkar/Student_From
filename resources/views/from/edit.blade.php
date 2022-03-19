<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student</title>
</head>
<body>
    <div class="container">
        @if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
        <div class="row align-items-center">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('from.update', $from->id) }}" method="post" enctype="multipart/form-data">

                  @csrf
           
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{$from ->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{$from->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <img src="{{ asset('from/one/'.$from->image)}}" alt="" height="60px" width="60px"><br />
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="form-control btn btn-primary">Primary</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
