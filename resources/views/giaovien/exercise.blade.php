@extends('/giaovien.layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('fontend/style.css') }}" rel="stylesheet" type="text/css"/>
        <title>Upload files</title>
</head>
<body>
		<h2>Upload exercise files: </h2><br>
        <form method="POST" action="{{route('exercise.upload')}}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file_exercise"/>
            <input type="submit" name="uploadclick" value="Upload" style="width: 100px; height: 40px; border-radius: 10px; color:#0e33ef;cursor: pointer; background: #99FFCC;"/>
        </form>
        <br>
        <h2>List of exercises: </h2><br>
        <table>
		<thead>
                <tr>
                        <th>Exercises</th>
                        <th>Submitted</th>
        	    </tr>
		</thead>
        <tbody>
            @foreach ($exercise as $ex)
                <tr>
                    <td>{{$ex->filename}}</td>
                    <td>
                        <a href="{{url('giaovien/submitted/'.$ex->id)}}" class="btn btn-info">Submitted</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
	</table>
</body>
</html>
@endsection
