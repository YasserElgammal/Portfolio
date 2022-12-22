@extends('admin.layouts.admin')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Welcome to Admin Page Dear/ <b>{{ $auth_user }}</b>
      </h3>

      

    </div> 
  </div>
  </div>

@endsection
