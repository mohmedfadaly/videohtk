@extends('back_end.layout.app')
@section('title')
    pages control
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"pages control"])
    @endcomponent

    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <div class="row">
                  <div class="col-md-8">
                      <h4 class="card-title ">pages control</h4>
                      <p class="card-pageegory"> Here you can edit /add /delete</p>
                  </div>
                  <div class="col-md-4 text-right">
                      <a href="{{ route('pages.create') }}" class="btn btn-white btn-round">add</a>
                  </div>
                </div>

 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>

                        <th class="text-right">
                          controler
                        </th>
                      </tr></thead>
                      <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>
                                {{ $page->id }}
                            </td>
                            <td>
                                {{ $page->name }}
                            </td>
                            <td class="td-actions text-right">
                              <a href="{{ route('pages.edit' , ['id' => $page]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit">
                                <i class="material-icons">edit</i>
                              </a>

                              <form action="{{route('pages.destroy', ['id' => $page->id])}}" method="POST"style="display: inline;">
                        
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
                  </div>
                </div>
              </div>
            </div>
        </div>


@endsection