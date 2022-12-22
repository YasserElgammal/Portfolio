@extends('admin.layouts.admin')

@section('content')
{{-- 
<div class="main-panel">
    <div class="content-wrapper"> --}}
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Service</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif
        {{-- <p class="card-description"> Basic form elements </p> --}}
        <form class="forms-sample" method="POST" action="{{ route('admin.service.update', $service->id )}}">
          @csrf
          @method('PUT')
            <div class="form-group">
          <p class="card-description"> Service Details <code>find all icons code <a href="https://fontawesome.com/icons/" target="_blank">Click here</a></code></p>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Icon</label>
                <div class="col-sm-9">
                  <input type="text" name="icon" class="form-control" placeholder="enter serivce icon" value="{{ $service->icon }}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Service Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" placeholder="enter service name" value="{{ $service->name }}" required/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Description</label>
              <textarea class="form-control" id="exampleTextarea1" rows="4" maxlength="255" name="description" required>{{ $service->description }}</textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
        </form>
      </div>
    </div>
  </div>
{{-- </div>
</div> --}}

@endsection
