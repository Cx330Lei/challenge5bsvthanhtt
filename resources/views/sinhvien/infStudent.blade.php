@extends('/sinhvien/layouts_manage')

@section('name')
<div class="container">
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Username</th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><img src="/uploads/{{$user->image}}" height=200></td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                        </tr>
                </tbody>
            </table>
        <div class="card">
            <div class="card-header">
                <h3>Edit information</h3>
            <div class="card-body">
                <form action="{{route('infStudent.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="email">
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <input type="password" name="password" value="{{$user->password}}" class="form-control" placeholder="password">
                            </div> 
                            <div class="form-group">
                                <strong>Phone</strong>
                                <input type="text" name="phone" value="{{$user->phone}}" class="form-control" placeholder="phone">
                            </div>
                            <div class="form-group">
                                <strong>Avatar</strong>
                                <input type="file" value="{{$user->image}}" name="file_update"><br/><br/>
                            </div>                                                                                 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection