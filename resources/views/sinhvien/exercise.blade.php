@extends('/sinhvien/layouts_manage')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('fontend/style.css') }}" rel="stylesheet" type="text/css"/>
        <title>Exercise</title>
</head>
<body>
        @if (Session::has('thongbao'))
        <div class="alert alert-success">
            {{Session::get('thongbao')}}
        </div>
        @endif
        <h2>List of exercises: </h2><br>
        <table>
		<thead>
                <tr>    
                        <th>Name</th>
                        <th>Download</th>
                        <th>Your Exercises</th>
        	    </tr>
		</thead>
        <tbody>
            @foreach ($exercise as $ex)
                <tr>
                    <td>{{$ex->filename}}</td>
                    <td>
                        <a href="/exercise/{{$ex->filename}}" class="btn btn-info">Download</a>
                    </td>
                    <td>
                        <form method="POST" action="{{url('/sinhvien/exercise/upload/'.$ex->id)}}" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file_exercise"/>
                                <input type="submit" name="uploadclick" value="Upload" style="width: 100px; height: 40px; border-radius: 10px; color:#0e33ef;cursor: pointer; background: #99FFCC;"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
	</table>
</body>
</html>
@endsection
