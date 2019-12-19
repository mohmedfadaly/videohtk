@extends('back_end.layout.app')
@section('title')
    create
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"create"])
    @endcomponent
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST"> 
            @csrf     
                <div class="row">
                    <div class="col-md-9 offset-md-2">
                      
                        <div class="form-group">
                                <label for="title">username</label>
                                <input type="text" name="name" id="name" class="form-control">
                        </div>
                
                        <div class="form-group">
                            <label for="body">email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="body">password</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        @php $input = "group"; @endphp
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">User Group</label>
                                <select name="{{$input}}" class="form-control">
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                </select>
                            </div>
                        </div>

                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        
                    </div>

                </div>
        </form>
    </div>

@endsection