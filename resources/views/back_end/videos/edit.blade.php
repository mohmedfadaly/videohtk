@extends('back_end.layout.app')
@section('title')
    edit
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"edit"])
    @endcomponent

    <div class="card-body">
        <form action="{{ route('videos.update' , ['id' => $video]) }}" method="POST"  enctype="multipart/form-data"> 
            @csrf
            @method('PUT')   
                <div class="row">
                    <div class="col-md-9 offset-md-2">
                      
                        <div class="form-group">
                                <label for="title">name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$video->name}}">
                        </div>

                        
                        <div class="form-group">
                            <label for="body">meta_des</label>
                            <input type="text" name="meta_des" id="meta_des" class="form-control" value="{{$video->meta_des}}">
                        </div>
                
                        <div class="form-group">
                            <label for="body">meta_keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{$video->meta_keywords}}">
                        </div>

                        <div class="form-group">
                                <label for="title">des</label>
                                <textarea  name="des" cols="30" rows="10" id="des" class="form-control">{{$video->des}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="body">youtube</label>
                            <input type="url" name="youtube" id="youtube" class="form-control" value="{{$video->youtube}}">
                            @php $url = getYoutubeId($video->youtube) @endphp
                                @if($url)
                                <iframe width="250" src="https://www.youtube.com/embed/{{ $url }}" style="margin-bottom: 20px" frameborder="0"  allowfullscreen></iframe>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="body">youtube state</label>
                            <select name="published" class="form-control"style="color:#863798;">
                                <option value="1" {{ isset($video) && $video->published == 1 ? 'selected'  :'' }}>published</option>
                                <option value="0" {{ isset($video) && $video->published == 0 ? 'selected'  :'' }}>hidden</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="body">Video Category</label>
                            <select name="cat_id" class="form-control"style="color:#863798;">
                                @foreach($categories  as $caegory)
                                    <option value="{{ $caegory->id }}" {{ isset($video) && $video->cat_id == $caegory->id ? 'selected'  :'' }}>{{ $caegory->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                        @php $input = "skills[]"; @endphp
                        <label for="body">skills</label>
                            <select name="{{$input}}" class="form-control" multiple style="height: 100px">
                                @foreach($skills  as $skill)
                                    <option value="{{ $skill->id }}" {{ in_array( $skill->id, $selectedSkills) ? 'selected' : '' }} >{{ $skill->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                        @php $input = "tags[]"; @endphp
                        <label for="body">tags</label>
                            <select name="{{$input}}" class="form-control" multiple style="height: 100px">
                                @foreach($tags  as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array( $tag->id, $selectedTags) ? 'selected' : '' }} >{{ $tag->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div>
                            <label for="body">video image</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                            <img src="{{ url('uploads/'.$video->image) }}" width="250">
                        </div>




                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                       
                        
                        
                    </div>

                </div>

        </form>

    </div>
    @component('back_end.shared.edit' , ['pageTitle' => "comments" , 'pageDes' => "here we can Control comments"])

            @include('back_end.comments.index')
        @slot('md4')
            @include('back_end.comments.create')
        @endslot
    @endcomponent
@endsection