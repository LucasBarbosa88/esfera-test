@extends('layouts/app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container note-details">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-block card-stretch">
        <div class="card-body custom-notes-space mb-4">
          <h3 class="">Home | {{$title}}</h3>
        </div>
      </div>
    </div>
  </div>
  <div>
    <a class="btn btn-info mt-2" href="{{route('create')}}"> New User</a>
  </div>
  <div class="card card-block card-stretch mt-2">
    <div class="row">
      <div class="col ml-2 mr-2">
        <table class="table table-striped tbl-server-info mt-4 responsive">
          <thead>
            <tr class="ligth">
              <th style="color: black!important">ID</th>
              <th style="color: black!important">Name</th>
              <th style="color: black!important">Phone</th>
              <th style="color: black!important">Email</th>
              <th style="color: black!important">Created at</th>
              <th style="color: black!important">Actions</th>
            </tr>
          </thead>
          @foreach($users as $user)
          <tbody>
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->phone}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at}}</td>
              <td>@include('users/partials/actions_user')</td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <div class="ml-3" style="margin-right: 2px;padding-top: 15px;float: right;">
          {{ $users->appends(request()->all())->render("pagination::bootstrap-4") }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection