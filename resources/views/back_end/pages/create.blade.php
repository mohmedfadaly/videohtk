@extends('back_end.layout.app')
@section('title')
    create
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"create"])
    @endcomponent
    <div class="card-body">
        <form action="{{ route('pages.store') }}" method="POST"> 
            @csrf     
                <div class="row">
                    <div class="col-md-9 offset-md-2">
                      
                        <div class="form-group">
                                <label for="title">name</label>
                                <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                                <label for="title">des</label>
                                <textarea  name="des" cols="30" rows="10" id="des" class="form-control"></textarea>
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
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        
                    </div>

                </div>
        </form>
    </div>

@endsection