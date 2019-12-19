<table class="table" id="comments">
    <tbody>
    @foreach($video->comments as $comment)
        <tr>
            <td>
                <small>{{ $comment->user->name }}</small>
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at }}</small>
            </td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" title="" onclick="$(this).closest('tr').next('tr').slideToggle()"  class="btn btn-white btn-link btn-sm"
                        data-original-title="Edit Comment">
                    <i class="material-icons">edit</i>
                </button>


                <form action="{{ route('comment.delete' , ['id' => $comment->id]) }}" method="POST"style="display: inline;">
                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="delete">
                        <i class="material-icons">close</i>
                        </button>

                    </form>
            </td>
        </tr>
        <tr style="display: none">
            <td colspan="4">
                <form action="{{ route('comment.update' , ['id' => $comment->id]) }}" method="post">
                    {{ csrf_field() }}
                        @method('PUT') 
                    @include('back_end.comments.form' , ['video' => $comment ])
                    <input type="hidden" value="{{ $video->id }}" name="video_id">
                    <button type="submit" class="btn btn-primary pull-right">update comment</button>
                    <div class="clearfix"></div>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>