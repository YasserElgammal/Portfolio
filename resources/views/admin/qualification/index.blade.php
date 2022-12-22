@extends('admin.layouts.admin')

@section('content')

                <div class="col-lg-12 grid-margin stretch-card">
                    
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Qualifications Records</h4>
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
                              <th> Type </th>
                              <th> From / To </th>
                              <th> Manage </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($qualifications as $qualification)
                            <tr>
                              <td> {{ $qualification -> id }} </td>
                              <td>{{ $qualification -> title }} </td>
                              <td>
                                {{ $qualification -> association }} 
                              </td>
                              <td>
                                {{ $qualification -> type }} 
                              </td>
                              <td>  {{ $qualification -> from }} - {{ $qualification -> to }}   </td>
                              <td> 
                                <a href="{{ route('admin.qualification.edit', $qualification->id) }}">
                                <button type="button" class="btn btn-success btn-sm">Edit</button>
                                </a>
                                <form type="submit" method="POST" action="{{ route('admin.qualification.destroy', $qualification->id)}}" onsubmit="return confirm('Are you sure?')">
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
