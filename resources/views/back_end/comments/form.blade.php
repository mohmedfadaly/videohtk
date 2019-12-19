@php $input = "comment"; @endphp
<div class="col-md-12">
    <div class="form-group">
        <label for="title">Comment</label>
        <textarea name="{{ $input }}"  cols="30" rows="2" class="form-control">{{ isset($video) ? $video->{$input} : '' }}</textarea>

    </div>
</div>