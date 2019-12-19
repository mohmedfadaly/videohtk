@extends('back_end.layout.app')
@section('title')
    cats control
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"cats control"])
    @endcomponent

    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <div class="row">
                  <div class="col-md-8">
                      <h4 class="card-title ">cats control</h4>
                      <p class="card-category"> Here you can edit /add /delete</p>
                  </div>
                  <div class="col-md-4 text-right">
                      <a href="{{ route('cats.create') }}" class="btn btn-white btn-round">add</a>
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
                        <th>
                          meta_keywords
                        </th>
                        <th>
                          meta_des
                        </th>
                        <th class="text-right">
                          controler
                        </th>
                      </tr></thead>
                      <tbody>
                    @foreach($cats as $cat)
                        <tr>
                            <td>
                                {{ $cat->id }}
                            </td>
                            <td>
                                {{ $cat->name }}
                            </td>
                            <td>
                                {{ $cat->meta_keywords }}
                            </td>
                            <td>
                                {{ $cat->meta_des }}
                            </td>
                            <td class="td-actions text-right">
                              <a href="{{ route('cats.edit' , ['id' => $cat]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit">
                                <i class="material-icons">edit</i>
                              </a>

                              <form action="{{route('cats.destroy', ['id' => $cat->id])}}" method="POST"style="display: inline;">
                        
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