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

                    <input type="hidden" name="UserID" id="UserID" value="0" />

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
                        <input class="form-control col-sm-3 require" type="email" id="txtEmail" name="Email" placeholder="enter email address" maxlength="100" />
                    </div>


                    <div class="form-group form-inline">
                        <label for="txtUsername" class="col-sm-2">Username</label>
                        <input class="form-control col-sm-3 require" type="text" id="txtUsername" name="Username" placeholder="enter username" maxlength="20"/>

                        <label class="col-sm-2" for="txtUsername">Role</label>
                        <select class="form-control col-sm-3 select2 require" id="sltRole" name="RoleID">
                          <option value="">Please select</option>
                          <?php foreach($roleDropDownList as $row): ?>
                              <option value="{{ $row->RoleID }}">{{ $row->RoleName }}</option>
                          <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group form-inline passDiv">
                        <label class="col-sm-2" for="txtPassword">Password</label>
                        <input class="form-control col-sm-3 require" type="password" id="txtPassword" name="Password" placeholder="enter password" maxlength="20" />
                       
                         <label class="col-sm-2" for="txtConfPassword">Confirm Password</label>
                        <input class="form-control col-sm-3 require" type="password" id="txtConfPassword" placeholder="enter confirm password" maxlength="20" />
                    </div>

                      <div class="row passBtn" hidden>
                          <div class="col-md-12 mb-2 text-center">
                             <button class="btn btn-primary">Change Password</button>
                          </div>
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
                          <tbody id="roleBody">
                            <?php
                              $cnt = 1;
                              $oldParentMenuID=0;
                              $isSameParent = false;
                            ?>
                            <?php
                              foreach($userRoles as $role): 
                               if($oldParentMenuID == $role->MenuID){
                                  $isSameParent = true;
                               }
                               else{
                                  $isSameParent = false;
                               }
                            ?>

                              @if(!$isSameParent)
                                <tr>
                                  <td style="font-weight: bold;">{{ $role->ParentTitle }}</td>
                                </tr>
                              @endif

                            <tr class="text-center">
                              <td>{{$role->Title}}</td>
                              <td class="chkbox-p">
                                  <div class="custom-control custom-checkbox" style="cursor: pointer;">
                                    <input type="checkbox" class="custom-control-input chkviews" id="chkView_{{ $role->MenuDetailID }}">
                                    <label class="custom-control-label" for="chkView_{{ $role->MenuDetailID }}"></label>
                                  </div>
                              </td>
                            </tr>
                              <?php $oldParentMenuID = $role->MenuID; $cnt++; ?>
                           <?php endforeach ?> 
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <input type="hidden" id="txtRoles" name="roles">

                    <div class="row" style="float: right">
                      <input type="button" id="btnSaveUser" class="btn btn-success mr-2" value="Save" />
                      <input type="button"  id="btnCancelUser" class="btn btn-danger" value="Cancel" />
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
<script>
    var mode_ = {!! json_encode($Mode) !!};    
    if(mode_ == 'Edit') {
        var userData_ = {!! json_encode($userData) !!};
        var userExistingRoles_ = {!! json_encode($userExistingRoles) !!};
        
        if(userData_ != null && userData_.length > 0) {
          $('#UserID').val(userData_[0].UserID);
          $('#txtFirstName').val(userData_[0].FirstName);
          $('#txtLastName').val(userData_[0].LastName);
          $('#txtPhone').val(userData_[0].Phone);
          $('#txtEmail').val(userData_[0].Email);
          $('#txtUsername').val(userData_[0].Username);
          $('#sltRole').val(userData_[0].RoleID);

          $('.passDiv').attr('hidden',true);
          $('.passBtn').removeAttr('hidden');
          
        }
    }
</script>
<script src="{{ URL::asset('Content/scripts/user/AddEditUser.js') }}"></script>
@endsection
