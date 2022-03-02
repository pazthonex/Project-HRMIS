@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">Tabs</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="/employee">Employee</a>
                            </li>
                            <li class="breadcrumb-item active">Modify Employee
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
<section id="basic-tabs-components">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h6><b>Update Employee</b></h6>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#personal" aria-controls="home" role="tab" aria-selected="true">
                            <i class="bx bx-home align-middle"></i>
                            <span class="align-middle">Personal Information</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#address" aria-controls="profile" role="tab" aria-selected="false">
                            <i class="bx bx-user align-middle"></i>
                            <span class="align-middle">Address</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="about-tab" data-toggle="tab" href="#card" aria-controls="about" role="tab" aria-selected="false">
                            <i class="bx bx-message-square align-middle"></i>
                            <span class="align-middle">Card Number</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="about-tab" data-toggle="tab" href="#others" aria-controls="about" role="tab" aria-selected="false">
                            <i class="bx bx-message-square align-middle"></i>
                            <span class="align-middle">Other Information</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal" aria-labelledby="home-tab" role="tabpanel">
                        <div class="card">
                            <form class="form-horizontal" id='form-update-employee-personal-profile' enctype="multipart/form-data" >
                                <input type="hidden" name="pp_id" id="pp_id" value="{{ $employee->id }}">
                                <input type="hidden" name="updatetype" value="personalprofile">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Firstname*</label>
                                            <div class="controls">
                                                <input type="text" name="firstname" class="form-control form-control-sm" data-validation-required-message="This field is required"
                                                value="{{ $employee->FirstName }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Middlename</label>
                                            <div class="controls">
                                                <input type="text" name="middlename" class="form-control form-control-sm" data-validation-required-message="This field is required" 
                                                value="{{ $employee->MiddleName }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Lastname *</label>
                                            <div class="controls">
                                                <input type="text" name="lastname" class="form-control form-control-sm" data-validation-required-message="This field is required"
                                                value="{{ $employee->LastName }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">   

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Ext</label>
                                            <div class="controls">
                                                <input type="text" name="ext" class="form-control" data-validation-required-message="This field is required" placeholder=""
                                                value="{{ $employee->Ext }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Suffix</label>
                                            <div class="controls">
                                                <input type="text" name="suffix" class="form-control" data-validation-required-message="This field is required" placeholder=""
                                                value="{{ $employee->Suffix }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Prefix</label>
                                            <div class="controls">
                                                <input type="text" name="prefix" class="form-control" data-validation-required-message="This field is required" placeholder=""
                                                value="{{ $employee->Prefix }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="controls">
                                                <select class='form-control  border-input' name='sex' value='{{ $employee->Sex }}' >
                                                    <option value="" disabled selected>Gender</option>
                                                        <option value='Male' >Male</option>
                                                        <option value='Female' >Female</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Civil Status</label>
                                            <div class="controls">
                                                <select class='form-control  border-input'  name='civilstatus' 
                                                value="{{ $employee->CivilStatus }}"
                                                >
                                                        <option value='Single' >Single</option>
                                                        <option value='Married' >Married</option>
                                                        <option value='Widow' >Widow</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Agency Number</label>
                                            <div class="controls">
                                                <input type="text" name="agencynumber" class="form-control " 
                                                value="{{ $employee->AgencyNumber }}"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div class="controls">
                                                <input type="date" name="dateofbirth" class="form-control"  value="{{ $employee->DateOfBirth }}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Place of Birth</label>
                                            <div class="controls">
                                                <input type="text" name="placeofbirth" class="form-control" data-validation-required-message="This field is required"  value="{{ $employee->PlaceOfBirth }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CitizenShip</label>
                                            <div class="controls">
                                                <input type="text" name="citizenship" class="form-control" data-validation-required-message="This field is required"  value="{{ $employee->Citizenship }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Employment Status</label>
                                            <div class="controls">
                                                <select class='form-control  border-input'  name='employmentstatus'  >
                                                    <option value='Job Order' >Job Order</option>
                                                    <option value='Casual' >Casual</option>
                                                    <option value='Part Timer' >Part Timer</option>
                                                    <option value='Permanent - Staff' >Permanent - Staff</option>
                                                    <option value='Permanent - Faculty' >Permanent - Faculty</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <div class="controls">
                                                <select class='form-control  border-input'  name='department'>
                                                    @foreach($department as $data)
                                                    <option value='{{ $data->id }}' >{{ $data->Description }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <div class="controls">
                                                <input type="email" name="emailaddress" class="form-control" value="{{ $employee->EmailAddress }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <div class="controls">
                                                <input type="text" name="telephone" class="form-control" value="{{ $employee->Telephone }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cellphone</label>
                                            <div class="controls">
                                                <input type="text" name="cellphone" class="form-control"  value="{{ $employee->Cellphone }}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-sm btn-primary" id="btn-update-employee-personal-profile">Save Changes</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="address" aria-labelledby="profile-tab" role="tabpanel">
                        <div class="card">
                            <form class="form-horizontal" id='form-employee-address'>
                                <input type="hidden" name="ad_id" id="ad_id" value="{{ $employee->id }}">
                                <input type="hidden" name="updatetype" value="address">
                                <h6><b>Residential</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> House No.</label>
                                            <div class="controls">
                                                <input type="text" name="rhouseno" class="form-control form-control-sm" value="{{ $employee->RHouseNo }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> HouseStreet</label>
                                            <div class="controls">
                                                <input type="text" name="rhousestreet" class="form-control form-control-sm" value="{{ $employee->RHouseStreet }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label> SubDivision</label>
                                            <div class="controls">
                                                <input type="text" name="rsubdivision" class="form-control form-control-sm" value="{{ $employee->RSubDivision}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">   

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label> Barangay</label>
                                            <div class="controls">
                                                <input type="text" name="rbarangay" class="form-control" value="{{ $employee->RBarangay}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <div class="controls">
                                                <input type="text" name="rtelephone" class="form-control" value="{{ $employee->RTelephone  }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <div class="controls">
                                                <input type="text" name="rzip" class="form-control" value="{{ $employee->RZip }}">
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <h6><b>Permanent</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> House No.  *</label>
                                            <div class="controls">
                                                <input type="text" name="phouseno" class="form-control form-control-sm" value="{{ $employee->PHouseNo }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> HouseStreet</label>
                                            <div class="controls">
                                                <input type="text" name="phousestreet" class="form-control form-control-sm" value="{{ $employee->PHouseStreet }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label> SubDivision</label>
                                            <div class="controls">
                                                <input type="text" name="psubdivision" class="form-control form-control-sm"  value="{{ $employee->PSubDivision}}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">   

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label> Barangay</label>
                                            <div class="controls">
                                                <input type="text" name="pbarangay" class="form-control" value="{{ $employee->PBarangay}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <div class="controls">
                                                <input type="text" name="ptelephone" class="form-control" value="{{ $employee->RTelephone  }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <div class="controls">
                                                <input type="text" name="pzip" class="form-control" value="{{ $employee->PZip }}">
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <hr>
                                <button type="button" id='btn-edit-employee-address' class="btn btn-sm btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="card" aria-labelledby="about-tab" role="tabpanel">
                        <div class="card">
                            <form class="form-horizontal" id="form-employee-cardnumber">
                                <input type="hidden" name="cn_id" id="cn_id" value="{{ $employee->id }}">
                                <input type="hidden" name="updatetype" value="cardnumber">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tin</label>
                                            <div class="controls">
                                                <input type="text" name="tin" class="form-control form-control-sm" 
                                                value="{{ $employee->TIN }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>GSISID</label>
                                            <div class="controls">
                                                <input type="text" name="gsisid" class="form-control form-control-sm" 
                                                value="{{ $employee->GSISID }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>PagIbig-ID</label>
                                            <div class="controls">
                                                <input type="text" name="pagibigid" class="form-control form-control-sm" 
                                                value="{{ $employee->PagIbigID }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>PhilHealth</label>
                                            <div class="controls">
                                                <input type="text" name="philhealth" class="form-control form-control-sm" 
                                                value="{{ $employee->PhilHealth }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">   

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>SSS</label>
                                            <div class="controls">
                                                <input type="text" name="sss" class="form-control" 
                                                value="{{ $employee->SSS }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Height</label>
                                            <div class="controls">
                                                <input type="text" name="height" class="form-control" 
                                                value="{{ $employee->Height }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <div class="controls">
                                                <input type="text" name="weight" class="form-control"
                                                value="{{ $employee->Weight }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Blood Type</label>
                                            <div class="controls">
                                                <input type="text" name="bloodtype" class="form-control" 
                                                value="{{ $employee->BloodType }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-sm btn-primary" id="btn-edit-employee-cardnumber">Save Changes</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="others" aria-labelledby="about-tab" role="tabpanel">
                        <div class="card">
                            <form class="form-horizontal" id="form-employee-other">
                                <input type="hidden" name="o_id" id="o_id" value="{{ $employee->id }}">
                                <input type="hidden" name="updatetype" value="other">
                                <div class="row">
                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Current Item</label>
                                            <div class="controls">
                                                <select class='form-control  border-input'  name='currentitem' 
                                                value="{{ $employee->CurrentItem }}"
                                                >
                                                        <option value='1' >Current Item 01</option>
                                                        <option value='2' >Current Item 02</option>
                                                        <option value='3' >Current Item 03</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Login Computation</label>
                                            <div class="controls">
                                                <input type="text" name="logincomputation" class="form-control " 
                                                value="{{ $employee->LoginComputation }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Is Active</label>
                                            <div class="controls">
                                                <select class='form-control  border-input' name='isactive' value='{{ $employee->isActive }}' >
                                                    <option value="" disabled selected></option>
                                                        <option value='0' >No</option>
                                                        <option value='1' >Yes</option>
                                                    </select>
                                                {{-- <input type="text" name="text" class="form-control" data-validation-required-message="This field is required" placeholder="First Name"> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">   
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <div class="controls">
                                                <input type="text" name="text" class="form-control"
                                                value="{{ $employee->Weight }}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <hr>
                                <button type="button" class="btn btn-sm btn-primary" id="btn-edit-employee-other">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
@push('scripts')
    <script>
        
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
            $('#btn-edit-employee-address').on('click', function(e){
                e.preventDefault();
                var id = $('#ad_id').val();
                $.ajax({
                    url: '/api/employee/update/'+id,
                    method: 'post',
                    data: $('#form-employee-address').serialize(),
                    // processData: false,
                    // dataType: false,
                    // contentType: false,
                    beforeSend:function(){
                         $('#btn-edit-employee-address').text('Loading..');
                    },
                    success:function(data){

                        if(data.status === 401){

                          
                            $.each(data.error, function(prefix,val){

                                toastr.error(val[0]);
                                //$('#form-employee-address').find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else if(data.status === 200){
                            console.log('success');
                          //  $('#add-employee-form')[0].reset();
                            //alert(data.msg);
                         //   $('#countries-table').DataTable().ajax.reload(null,false);
                            toastr.success(data.msg);
                        }
                           
                        
                        $('#btn-edit-employee-address').text('Save Changes');
                       
                    }

                });


            });
            $('#btn-update-employee-personal-profile').on('click', function(e){
                e.preventDefault();
                var id = $('#pp_id').val();
                $.ajax({
                    url: '/api/employee/update/'+id,
                    method: 'post',
                    data: $('#form-update-employee-personal-profile').serialize(),
                    // processData: false,
                    // dataType: false,
                    // contentType: false,
                    beforeSend:function(){
                    
                         $('#btn-update-employee-personal-profile').text('Loading..');
                    },
                    success:function(data){
                       

                        if(data.status === 401){
                            $.each(data.error, function(prefix,val){
                                $('#add-employee-form').find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else if(data.status === 200){
                          //  $('#add-employee-form')[0].reset();
                            //alert(data.msg);
                         //   $('#countries-table').DataTable().ajax.reload(null,false);
                            toastr.success(data.msg);
                        }
                          //  window.location.href = '/employee'
                        
                        $('#btn-update-employee-personal-profile').text('Save Changes');
                    }

                });


            });


            $('#btn-edit-employee-cardnumber').on('click', function(e){
                e.preventDefault();
                var id = $('#cn_id').val();
                $.ajax({
                    url: '/api/employee/update/'+id,
                    method: 'post',
                    data: $('#form-employee-cardnumber').serialize(),
                    // processData: false,
                    // dataType: false,
                    // contentType: false,
                    beforeSend:function(){
                         $('#btn-edit-employee-cardnumber').text('Loading..');
                    },
                    success:function(data){
                        if(data.status === 401){
                            $.each(data.error, function(prefix,val){
                                $('#form-employee-cardnumber').find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else if(data.status === 200){
                          //  $('#add-employee-form')[0].reset();
                            //alert(data.msg);
                         //   $('#countries-table').DataTable().ajax.reload(null,false);
                            toastr.success(data.msg);
                        }
                        else {
                            //window.location.href = '/employee'
                        }
                        $('#btn-edit-employee-cardnumber').text('Save Changes');
                    }

                });


            });



            $('#btn-edit-employee-other').on('click', function(e){
                e.preventDefault();
                var id = $('#o_id').val();
                $.ajax({
                    url: '/api/employee/update/'+id,
                    method: 'post',
                    data: $('#form-employee-other').serialize(),
                    // processData: false,
                    // dataType: false,
                    // contentType: false,
                    beforeSend:function(){
                         $('#btn-update-employee-personal-profile').text('Loading..');
                    },
                    success:function(data){
                        if(data.status === 401){
                            $.each(data.error, function(prefix,val){
                                $('#add-employee-form').find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else if(data.status === 200){
                          //  $('#add-employee-form')[0].reset();
                            //alert(data.msg);
                         //   $('#countries-table').DataTable().ajax.reload(null,false);
                            toastr.success(data.msg);
                        }else {
                           // window.location.href = '/employee'
                        }
                        $('#btn-edit-employee-other').text('Save Changes');
                    }

                });


            });


            


            });
    </script>
@endpush
@endsection