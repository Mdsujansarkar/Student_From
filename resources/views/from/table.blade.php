<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row align-items-center">
        <a href="{{URL::to('/from/one/hello') }}">Student Add</a>
            <div class="col-md-10 offset-md-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 0)
                        @foreach($froms as $from)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{ $from->name}}</td>
                            <td>{{ $from->description}}</td>
                            <td><img src="{{ asset('from/one/'.$from->image)}}" alt="" height="60px" width="60px"></td>
                            <td><a href="{{route('from.edit', $from->id)}}">Edit</a></td>
                            <td><a href="{{route('from.delete', $from->id)}}" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
                    {!! $froms->links() !!}
            
        </div>
    </div>
</body>
</html>