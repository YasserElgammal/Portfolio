@extends('admin.layouts.admin')

@section('content')

                <div class="col-lg-12 grid-margin stretch-card">
                    
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Experience Records</h4>
                        <a href="{{ route('admin.qualification.create')}}">
                        <button type="button" class="btn btn-primary btn-fw ">Add New</button>
                        </a>
                        {{-- <p class="card-description"></code> --}}
                        </p>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th> # </th>
                              <th> Title </th>
                              <th> Aassociation </th>
                              <th> Description </th>
                              <th> From / To </th>
                              <th> Manage </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($experiences as $experience)
                            <tr>
                              <td> {{ $experience -> id }} </td>
                              <td>{{ $experience -> title }} </td>
                              <td>
                                {{ $experience -> association }} 
                              </td>
                              <td>  {{ substr($experience -> description,0,20) }}  </td>
                              <td>  {{ $experience -> from }} - {{ $experience -> to }}   </td>
                              <td> 
                                <a href="{{ route('admin.qualification.edit', $experience->id) }}">
                                <button type="button" class="btn btn-success btn-sm">Edit</button>
                                </a>
                                <form type="submit" method="POST" action="{{ route('admin.qualification.destroy', $experience->id)}}" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            </tr>
                            <tr>
                                
                                @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
{{-- 
            </div>
        </div> --}}
@endsection
