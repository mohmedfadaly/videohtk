@extends('back_end.layout.app')
@section('title')
    videos control
@endsection
@section('content')
    @component('back_end.layout.header', ['nav_title'=>"videos control"])
    @endcomponent

    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <div class="row">
                  <div class="col-md-8">
                      <h4 class="card-title ">videos control</h4>
                      <p class="card-videoegory"> Here you can edit /add /delete</p>
                  </div>
                  <div class="col-md-4 text-right">
                      <a href="{{ route('videos.create') }}" class="btn btn-white btn-round">add</a>
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
                          state
                        </th>
                        <th>
                          Category
                        </th>
                        <th>
                          User
                        </th>

                        <th class="text-right">
                          controler
                        </th>
                      </tr></thead>
                      <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <td>
                                {{ $video->id }}
                            </td>
                            <td>
                                {{ $video->name }}
                            </td>
                            <td>
                            @if($video->published == 1)
                                published
                            @else
                                hidden
                            @endif
                        </td>
                        <td>
                            {{ $video->cat->name }}
                        </td>
                        <td>
                            {{ $video->user->name }}
                        </td>
                            <td class="td-actions text-right">
                              <a href="{{ route('videos.edit' , ['id' => $video]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit">
                                <i class="material-icons">edit</i>
                              </a>

                              <form action="{{route('videos.destroy', ['id' => $video->id])}}" method="POST"style="display: inline;">
                        
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