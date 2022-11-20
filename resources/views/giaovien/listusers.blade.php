@extends('/giaovien/layouts_manage')

@section('name')

    <h3>List of users</h3><br>
    <div class="container">
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
                        @foreach ($user as $sv)
                            <tr>
                                <td><img src="/uploads/{{$sv->image}}" height=200></td>
                                <td>{{$sv->id}}</td>
                                <td>{{$sv->username}}</td>
                                <td>{{$sv->name}}</td>
                                <td>{{$sv->email}}</td>
                                <td>{{$sv->phone}}</td>
                                <td>
                                        <a href="{{route('comment.detail', $sv->id)}}" class="btn btn-info">Leave message</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection