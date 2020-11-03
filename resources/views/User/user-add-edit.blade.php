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
                   <form id="frmUserAddEdit" action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="form-group form-inline">
                        <label for="txtFirstName" class="col-sm-2">First name</label>
                        <input class="form-control col-sm-3 require" type="text" data-alpha="true" id="txtFirstName" name="FirstName" placeholder="enter firstname" maxlength="50" />

                        <label for="txtLastName" class="col-sm-2">Last name</label>
                        <input class="form-control col-sm-3 require" type="text"  data-alpha="true" id="txtLastName" name="LastName" placeholder="enter lastname" maxlength="50" />
                    </div>

                    <div class="form-group form-inline">
                        <label for="txtPhone"  class="col-sm-2">Phone</label>
                        <input class="form-control col-sm-3 require" type="text"  data-number="true" id="txtPhone" name="Phone" placeholder="enter phone" maxlength="11" data-inputmask='"mask": "(999) 999-9999"' data-mask />
                        <label  for="txtEmail"  class="col-sm-2">Email</label>
                        <input class="form-control col-sm-3 require" type="text" id="txtEmail" name="Email" placeholder="enter email address" maxlength="100" />
                    </div>


                    <div class="form-group form-inline">
                        <label for="txtUsername" class="col-sm-2">Username</label>
                        <input class="form-control col-sm-3 require" type="text" id="txtUsername" name="Username" placeholder="enter username" maxlength="20"/>

                        <label class="col-sm-2" for="txtUsername">Role</label>
                        <select class="form-control col-sm-3 select2 require" id="sltRole" name="RoleID">
                            <option value="">Please select</option>
                            <option value="1">Administrator</option>
                            <option value="2">Other</option>
                        </select>
                    </div>

                    <div class="form-group form-inline">
                        <label class="col-sm-2" for="txtPassword">Password</label>
                        <input class="form-control col-sm-3 require" type="password" id="txtPassword" name="Password" placeholder="enter password" maxlength="20" />
                       
                         <label class="col-sm-2" for="txtConfPassword">Confirm Password</label>
                        <input class="form-control col-sm-3 require" type="password" id="txtConfPassword" placeholder="enter confirm password" maxlength="20" />
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
                              <th scope="row">Can View</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td style="font-weight: bold;">Configurations</td>
                            </tr>

                            <tr class="text-center">
                              <td>Users</td>
                              <td class="chkbox-p">
                                  <div class="custom-control custom-checkbox" style="cursor: pointer;">
                                    <input type="checkbox" class="custom-control-input chkview" id="chkView_1" name="view[]">
                                    <label class="custom-control-label" for="chkView_1"></label>
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
