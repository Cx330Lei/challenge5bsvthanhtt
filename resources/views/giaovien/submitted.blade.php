@extends('/giaovien.layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Submitted</title>
</head>
<body>
        <h2>List of exercises submitted: </h2><br>
        <table>
		<thead>
                <tr>
                    <th>Name</th>
                    <th>Download</th>
        	    </tr>
		</thead>
        <tbody>
            @foreach ($Yourfile as $yf)
                <tr>
                    <td>{{$yf->filename_y}}</td>
                    <td><a href="/yourfile/{{$yf->filename_y}}">Download</a></td>
                </tr>
            @endforeach
        </tbody>
	</table>
</body>
</html>
@endsection