
 
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <form action="{{url('upload')}}" method="post" enctype="multipart/form-data">
       {{csrf_field()}}
       <p>file <input type="file" name="file"></p>
       <p><input type="submit" name=""></p>
    </form>
</body>
</html>