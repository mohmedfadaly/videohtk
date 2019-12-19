@extends('back_end.layout.app')
@section('title')
    message control
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"message control"])
    @endcomponent

    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <div class="row">
                  <div class="col-md-8">
                      <h4 class="card-title ">message control</h4>
                      <p class="card-videoegory"> Here you can edit /add /delete</p>
                  </div>
                  <div class="col-md-4 text-right">
                      <a href="{{ route('messages.create') }}" class="btn btn-white btn-round">add</a>
                  </div>
                </div>

 
                </div>
                <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        email
                    </th>
                    <th class="text-right">
                        control
                    </th>
                </tr></thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>
                            {{ $row->id }}
                        </td>
                        <td>
                            {{ $row->name }}
                        </td>
                        <td>
                            {{ $row->email }}
                        </td>
                        <td class="td-actions text-right">
                              <a href="{{ route('messages.edit' , ['id' => $row]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit">
                                <i class="material-icons">edit</i>
                              </a>

                              <form action="{{route('messages.destroy', ['id' => $row->id])}}" method="POST"style="display: inline;">
                        
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="delete">
                                  <i class="material-icons">close</i>
                                  </button>

                              </form>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $rows->links() !!}
        </div>
        </div>
        </div>
        </div>
    </div>
@endsection
