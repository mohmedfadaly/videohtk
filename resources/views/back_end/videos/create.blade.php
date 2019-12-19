@extends('back_end.layout.app')
@section('title')
    create
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"create"])
    @endcomponent
    <div class="card-body">
        <form action="{{ route('videos.store') }}" method="POST"  enctype="multipart/form-data"> 
            @csrf     
                <div class="video">
                    <div class="col-md-9 offset-md-2">
                      
                        <div class="form-group">
                                <label for="title">name</label>
                                <input type="text" name="name" id="name" class="form-control">
                        </div>

                        
                        <div class="form-group">
                            <label for="body">meta_des</label>
                            <input type="text" name="meta_des" id="meta_des" class="form-control">
                        </div>
                
                        <div class="form-group">
                            <label for="body">meta_keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control">
                        </div>

                        <div class="form-group">
                                <label for="title">des</label>
                                <textarea  name="des" cols="30" videos="10" id="des" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="body">youtube</label>
                            <input type="url" name="youtube" id="youtube" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="body">youtube state</label>
                            <select name="published" class="form-control"style="color:#863798;">
                                <option value="1">published</option>
                                <option value="0">hidden</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="body">Video Category</label>
                            <select name="cat_id" class="form-control"style="color:#863798;">
                                @foreach($categories  as $category)
                                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                        @php $input = "skills[]"; @endphp
                        <label for="body">skills</label>
                            <select name="{{$input}}" class="form-control" multiple style="height: 100px;">
                                @foreach($skills  as $skill)
                                    <option value="{{ $skill->id }}" >{{ $skill->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                        @php $input = "tags[]"; @endphp
                        <label for="body">tags</label>
                            <select name="{{$input}}" class="form-control" multiple style="height: 100px;">
                                @foreach($tags  as $tag)
                                    <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div>
                        <label >Video image</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        
                    </div>

                </div>
        </form>
    </div>

@endsection