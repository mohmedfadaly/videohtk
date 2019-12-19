@extends('back_end.layout.app')
@section('title')
    edit
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"edit"])
    @endcomponent


    <div class="card-body">
        <form action="{{ route('messages.update' , ['id' => $row]) }}" method="POST"  enctype="multipart/form-data"> 
            @csrf
            @method('PUT')   
                <div class="row">
                @php $input = "name"; @endphp
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Category Name</label>
                            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
                                class="form-control">
                            
                            <span class="invalid-feedback" role="alert">
                                    
                            </span>
                        
                        </div>
                    </div>
                    @php $input = "email"; @endphp
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="text" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}"
                                class="form-control">
                
                            <span class="invalid-feedback" role="alert">
                                                    
                            </span>

                        </div>
                    </div>
                    @php $input = "message"; @endphp
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Message</label>
                            <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control">{{ isset($row) ? $row->{$input} : '' }}</textarea>
                        
                            <span class="invalid-feedback" role="alert">
                                
                            </span>
                    
                        </div>
                    </div>
                </div>

                
                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>

                        
                    </div>


                </div>
                <hr>

                <h4>Replay On Message</h4>

<br>

<form action="{{ route('message.replay' , ['id' => $row->id]) }}" method="post">
    {{ csrf_field() }}
    @method('PUT')
    @php $input = "message"; @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control"></textarea>
            <span class="invalid-feedback" role="alert">
                    
            </span>
    
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Replay Message</button>
    <div class="clearfix"></div>
</form>
@endsection
