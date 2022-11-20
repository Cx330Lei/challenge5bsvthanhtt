@extends('/giaovien/layouts_manage')

@section('name')

    <h3>Student management</h3>
    <a href="{{route('sinhvien.create')}}" class="btn btn-primary float-end">Add user</a>
    <br><br>
    <div class="container">
                @if (Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sinhvien as $sv)
                            <tr>
                                <td><img src="/uploads/{{$sv->image}}" height=200></td>
                                <td>{{$sv->id}}</td>
                                <td>{{$sv->username}}</td>
                                <td>{{$sv->name}}</td>
                                <td>{{$sv->email}}</td>
                                <td>{{$sv->phone}}</td>
                                <td>
                                    <form action="{{route('sinhvien.destroy', $sv->id)}}" method="POST">
                                        <a href="{{route('sinhvien.edit', $sv->id)}}" class="btn btn-info">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection