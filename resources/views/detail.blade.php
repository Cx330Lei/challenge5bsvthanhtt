@extends('/sinhvien.layouts.master')

@section('content')

<a style="margin-bottom: 40px" class="btn btn-primary" href="{{ route('sinhvien.listusersSV') }}">Back</a>
<div class="right__title" >  User {{ $user->username }} Messages </div>
<table class="table table-bordered">
    <tr>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Content</th>
        <th>Time</th>
        <th>Edit at</th>
        <th>Action</th>
    </tr>
    @if(!empty($comments[0]))
        @foreach($comments as $comment)
            <tr >
                <td>{{ $comment->username }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>
                @if($comment->created_at!=$comment->updated_at) {{ $comment->updated_at }} @else {{ $comment->created_at }} @endif
                </td>
                <td>
                    <form method="POST" action="{{ route('comment.delete',$comment->id) }}" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="user_id1" value="{{$user->id}}">
                    <button style="background-color:transparent;" title="Delete" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6">No messages!</td>
        </tr>
    @endif
</table>
<div class="right__title" ></div>
<form method="POST" action="@if(!empty($com->content)){{ route('comment.update',$com->id) }}@else {{ route('comment.create') }}@endif" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="hidden" name="user_id1" value="{{ $user->id }}">
        <label>Message</label>
        <textarea required name="content"  id="summary" class="form-control">@if(!empty($com->content)){{$com->content}} @endif</textarea>
    </div>
    <input type="submit" class="btn btn-success mt-2" name="submit" value="<?php echo (!empty($com->content)) ? 'Update message' : 'Send message' ?>"/>
</form>
@endsection