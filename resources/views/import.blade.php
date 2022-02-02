<!DOCTYPE html>
<html>
<head>
        <title>
            Import Data.
        </title>
</head>
<body>


    <form action="{{url('/import')}}" method="post" enctype="multipart/form-data">
        @csrf
<input type="file" name="file">

    <input type="submit" value="Import Data">
    <br><a href="{{route('admin_students')}}" class="btn btn-secondary offset-md-7">Back</a></br>
</form>
</body>
</html>
