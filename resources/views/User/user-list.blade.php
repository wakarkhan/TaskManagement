@extends('main_layout')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-dark btn-sm" href="/user/logout">Logout</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<hr>
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row text-right mb-3">
            <div class="col-md-12"><button class="btn btn-success btn-md" onclick="window.location.href='/user/create'">Create New</button> </div>
        </div>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-dark">
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($userList as $user): ?>
                <tr>
                  <td>{{ $user->FirstName . ' ' . $user->LastName }}</td>
                  <td>{{ $user->Phone }}</td>
                  <td>{{ $user->Email }}</td>
                  <td>{{ $user->Username }}</td>
                  <td>{{ $user->RoleName }}</td>
                  <td>
                      <a id="btnEditUser" href="{{ route('user.edit',$user->Username) }}" class="btn btn-primary btn-sm" >Edit</button>
                      <a id="btnDeleteUser" class="btn btn-danger btn-sm" data-id ="{{ $user->UserID }}">Delete</button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
        </table>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('externaljss')
<script src="{{ URL::asset('Content/scripts/user/UserListing.js') }}"></script>
@endsection
