@extends('back_end.layout.app')
@section('title')
    create
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"create"])
    @endcomponent
    <div class="card-body">
        <form action="{{ route('messages.store') }}" method="POST"> 
            @csrf     
                <div class="row">
                @php $input = "name"; @endphp
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Category Name</label>
                                <input type="text" name="{{ $input }}"
                                    class="form-control">
                                
                                <span class="invalid-feedback" role="alert">
                                        
                                </span>
                            
                            </div>
                        </div>
                        @php $input = "email"; @endphp
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input type="text" name="{{$input}}"
                                    class="form-control">
                    
                                <span class="invalid-feedback" role="alert">
                                                        
                                </span>

                            </div>
                        </div>
                        @php $input = "message"; @endphp
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Message</label>
                                <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control"></textarea>
                            
                                <span class="invalid-feedback" role="alert">
                                    
                                </span>
                        
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                   

                    <hr>


                        <div class="clearfix"></div>

                </div>
        </form>
    </div>

@endsection
