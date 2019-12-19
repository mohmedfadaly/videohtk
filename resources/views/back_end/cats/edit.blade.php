@extends('back_end.layout.app')
@section('title')
    edit
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"edit"])
    @endcomponent

    <div class="card-body">
        <form action="{{ route('cats.update' , ['id' => $category]) }}" method="POST"> 
            @csrf
            @method('PUT')   
                <div class="row">
                    <div class="col-md-9 offset-md-2">
                      
                        <div class="form-group">
                                <label for="title">name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
                        </div>
                
                        <div class="form-group">
                            <label for="body">meta_keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{$category->meta_keywords}}">
                        </div>

                        <div class="form-group">
                            <label for="body">meta_des</label>
                            <input type="text" name="meta_des" id="meta_des" class="form-control" value="{{$category->meta_des}}">
                        </div>

                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                        
                    </div>

                </div>
        </form>
    </div>

@endsection