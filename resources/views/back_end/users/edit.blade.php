@extends('back_end.layout.app')
@section('title')
    edit
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"edit"])
    @endcomponent

    <div class="card-body">
        <form action="{{ route('users.update' , ['id' => $user]) }}" method="POST"> 
            @csrf
            @method('PUT')   
                <div class="row">
                    <div class="col-md-9 offset-md-2">
                      
                        <div class="form-group">
                                <label for="title">username</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                        </div>
                
                        <div class="form-group">
                            <label for="body">email</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="body">password</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        @php $input = "group"; @endphp
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">User Group</label>
                                <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                                    <option value="admin" {{ isset($row) && $row->{$input} == 'admin' ? 'selected'  :'' }}>admin</option>
                                    <option value="user" {{ isset($row) && $row->{$input} == 'user' ? 'selected'  :'' }}>user</option>
                                </select>
                            </div>
                        </div>

                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                        
                    </div>

                </div>
        </form>
    </div>

@endsection