@extends('admin.layouts.admin')

@section('content')

                <div class="col-lg-12 grid-margin stretch-card">
                    
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Skills Records</h4>
                        <a href="{{ route('admin.skill.create')}}">
                        <button type="button" class="btn btn-primary btn-fw ">Add New</button>
                        </a>
                        {{-- <p class="card-description"></code> --}}
                        </p>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th> # </th>
                              <th> Skill </th>
                              <th> Percent </th>
                              <th> Manage </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($skills as $skill)
                            <tr>
                              <td> {{ $skill -> id }} </td>
                              <td> {{ $skill -> name }} </td>
                              <td> 
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{$skill->percent}}%; background-color: {{$skill->color}}" aria-valuenow="{{$skill->percent}}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>    
                                </td>
                              <td> 
                                <button type="button" class="btn btn-success btn-sm me-1 " onclick="location.href='{{ route('admin.skill.edit', $skill->id) }}';">Edit</button>
                                  <form type="submit" method="POST" style="display: inline" action="{{ route('admin.skill.destroy', $skill->id)}}" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="style="display: inline"">Delete</button>
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
