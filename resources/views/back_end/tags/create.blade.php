@extends('back_end.layout.app')
@section('title')
    create
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"create"])
    @endcomponent
    <div class="card-body">
        <form action="{{ route('tags.store') }}" method="POST"> 
            @csrf     
                <div class="row">
                    <div class="col-md-9 offset-md-2">
                      
                        <div class="form-group">
                                <label for="title">name</label>
                                <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <span class="invalid-feedback" role="alert">
                            
                        </span>
                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        
                    </div>

                </div>
        </form>
    </div>

@endsection