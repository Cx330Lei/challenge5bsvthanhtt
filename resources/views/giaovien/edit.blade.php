@extends('/giaovien/layouts_manage')

@section('name')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Edit student</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('sinhvien.index')}}" class="btn btn-primary float-end">List of students</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('sinhvien.update', $sinhvien->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Username</strong>
                                <input type="text" name="username" value="{{$sinhvien->username}}" class="form-control" placeholder="username">
                            </div>
                            <div class="form-group">
                                <strong>Name</strong>
                                <input type="text" name="name" value="{{$sinhvien->name}}" class="form-control" placeholder="name">
                            </div>
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" name="email" value="{{$sinhvien->email}}" class="form-control" placeholder="email">
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <input type="password" name="password" value="{{$sinhvien->password}}" class="form-control" placeholder="password">
                            </div> 
                            <div class="form-group">
                                <strong>Phone</strong>
                                <input type="text" name="phone" value="{{$sinhvien->phone}}" class="form-control" placeholder="phone">
                            </div>
                            <div class="form-group">
                                <strong>Avatar</strong>
                                <input type="file" value="{{$sinhvien->image}}" name="file_update"><br/><br/>
                            </div>                                                                                 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection