@extends('/giaovien/layouts_manage')

@section('name')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Add student</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('sinhvien.index')}}" class="btn btn-primary float-end">List of students</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('sinhvien.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Username</strong>
                                <input type="text" name="username" class="form-control" placeholder="username" required>
                            </div>
                            <div class="form-group">
                                <strong>Name</strong>
                                <input type="text" name="name" class="form-control" placeholder="name" required>
                            </div>
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" name="email" class="form-control" placeholder="email" required>
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <input type="password" name="password" class="form-control" placeholder="password" required>
                            </div> 
                            <div class="form-group">
                                <strong>Phone</strong>
                                <input type="text" name="phone" class="form-control" placeholder="phone" required>
                            </div>
                            <div class="form-group">
                                <strong>Role</strong>
                                <input type="int" name="role" class="form-control" placeholder="role" required>
                            </div>
                            <div class="form-group">
                                <strong>Avatar</strong>
                                <input type="file" name="file_image"><br/><br/>
                            </div>                                                                                 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection