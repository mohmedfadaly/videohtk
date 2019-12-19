<form action="{{ route('comments.store') }}" method="post">
    {{ csrf_field() }}
    @include('back_end.comments.form')
    <input type="hidden" value="{{ $video->id }}" name="video_id">
    <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
    <div class="clearfix"></div>
</form>