@extends('main_layout')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 id="lblHeading" class="m-0">Create User</h1>
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
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                   <form id="frmUserAddEdit" action="/user/store" method="POST">
                    <div class="form-group form-inline">
                        <label for="txtFirstName">First name</label>
                        <input class="form-control mx-2 require" type="text" id="txtFirstName" name="FirstName" placeholder="enter firstname" maxlength="50" />

                        <label for="txtLastName">Last name</label>
                        <input class="form-control mx-2 require" type="text" id="txtLastName" name="LastName" placeholder="enter lastname" maxlength="50" />

                        <label for="txtPhone">Phone</label>
                        <input class="form-control mx-2 require" type="text" id="txtPhone" name="Phone" placeholder="enter phone" maxlength="11" data-inputmask='"mask": "(999) 999-9999"' data-mask />
                    </div>

                    <div class="form-group form-inline">
                        <label class="mx-3" for="txtEmail">Email</label>
                        <input class="form-control mx-2 require" type="text" id="txtEmail" name="Email" placeholder="enter email address" maxlength="100" />

                        <label for="txtUsername">Username</label>
                        <input class="form-control mx-2 require" type="text" id="txtUsername" name="Username" placeholder="enter username" maxlength="20"/>

                        <label class="mx-3" for="txtUsername">Role</label>
                        <select class="form-control select2 require" id="sltRole" name="RoleID" style="width:14em">
                            <option>Please select</option>
                            <option>Administrator</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-md-12 mb-2">
                         <h3 class="text-center">User Permission</h3>
                      </div>
                      <div class="col-md-12">
                        <table class="table table-bordered">
                          <thead class="bg-secondary">
                            <tr class="text-center">
                              <th scope="row">Privileges</th>
                              <th scope="row">View</th>
                              <th scope="row">Edit</th>
                              <th scope="row">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td style="font-weight: bold;">Configurations</td>
                            </tr>
                            <tr class="text-center">
                              <td>Users</td>
                              <td> 
                                  <div class="custom-control custom-checkbox" style="cursor: pointer;">
                                    <input type="checkbox" class="custom-control-input chkview" id="chkView_1" name="view[]">
                                    <label class="custom-control-label" for="chkView_1"></label>
                                  </div>
                              </td>
                              <td>
                                  <div class="custom-control custom-checkbox" style="cursor: pointer;">
                                    <input type="checkbox" class="custom-control-input chkedit" id="chkEdit_1" name="edit[]">
                                    <label class="custom-control-label" for="chkEdit_1"></label>
                                  </div>
                              </td>
                              <td>
                                  <div class="custom-control custom-checkbox" style="cursor: pointer;">
                                    <input type="checkbox" class="custom-control-input chkdelete" id="chkDelete_1" name="delete[]">
                                    <label class="custom-control-label" for="chkDelete_1"></label>
                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="row" style="float: right">
                        <button id="btnSaveUser" class="btn btn-success mr-2">Save</button>
                        <button id="btnCancelUser" class="btn btn-danger ">Cancel</button>
                    </div>
                </form>
                </div>
              </div>

            </div>
        </div>
      </div> <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('externaljss')
<script src="{{ URL::asset('Content/scripts/user/AddEditUser.js') }}"></script>
@endsection
