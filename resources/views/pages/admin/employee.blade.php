@extends('layouts.admin')
 @section('content')
 <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">HRMIS</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Employee
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employee Table</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-employee"> <i class="bx bx-user-plus"></i> Add New</button>
                        <div class="table-responsive">
                            <table class="table zero-configurationz" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Firstname</th>
                                        <th>Middlename</th>
                                        <th>Lastname</th>
                                        <th>Sex</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>CellPhone</th>
                                        <th>Employment Status</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <!-- DElete Modal -->
    <div class="modal fade" id="delete-employee-modal">
        <div class="modal-dialog modal-md modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Delete Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" id="delete-employee-form" >
            <div class="modal-body">
                @csrf
                <input type="hidden" id='delete_id' name="id">
                <div class="modal-body">
                    <h5>Are you sure want to delete this employee?</h5>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-default btn-sm" data-dismiss="modal">No</button>
              <button type="button" class="btn btn-primary btn-sm" id="confirm-delete-employee">Yes</button>
            </div>
          </form>
          </div>
        </div>
      </div>
  
  <!-- ADD Modal -->
    <div class="modal fade" id="add-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form class="form-horizontal" action="{{ route('employee.add') }}" method="post" id="add-employee-form" enctype="multipart/form-data">
                    @csrf
                   
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Firstname *</label>
                                <div class="controls">
                                    <input type="text" name="firstname" class="form-control" >
                                    <span class="text-danger error-text firstname_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Middlename</label>
                                <div class="controls">
                                    <input type="text" name="middlename" class="form-control " >
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Lastname *</label>
                                <div class="controls">
                                    <input type="text" name="lastname" class="form-control">
                                    <span class="text-danger error-text lastname_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ext</label>
                                <div class="controls">
                                    <input type="text" name="ext" class="form-control" data-validation-required-message="This field is required" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Suffix</label>
                                <div class="controls">
                                    <input type="text" name="suffix" class="form-control" data-validation-required-message="This field is required" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Prefix</label>
                                <div class="controls">
                                    <input type="text" name="prefix" class="form-control" data-validation-required-message="This field is required" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="controls">
                                    <select class='form-control  border-input' data-validation-required-message="This field is required" name='sex' >
                                        <option value="" disabled selected>Gender</option>
                                            <option value='Male' >Male</option>
                                            <option value='Female' >Female</option>
                                        </select>
                                    {{-- <input type="text" name="text" class="form-control" data-validation-required-message="This field is required" placeholder="First Name"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Civil Status</label>
                                <div class="controls">
                                    <select class='form-control  border-input' data-validation-required-message="This field is required"  name='civilstatus' >
                                            <option value='Single' >Single</option>
                                            <option value='Married' >Married</option>
                                            <option value='Widow' >Widow</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>AgencyNumber</label>
                                <div class="controls">
                                    <input type="text" name="agencynumber" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <div class="controls">
                                    <input type="date" name="dateofbirth" class="form-control" data-validation-required-message="This field is required" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Place of Birth</label>
                                <div class="controls">
                                    <input type="text" name="placeofbirth" class="form-control" data-validation-required-message="This field is required" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>CitizenShip</label>
                                <div class="controls">
                                    <input type="text" name="citizenship" class="form-control" data-validation-required-message="This field is required" >
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
                                        <option value='{{ $data->id }}' >{{  $data->Description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="controls">
                                    <input type="email" name="emailaddress" class="form-control" >
                                    <span class="text-danger error-text emailaddress_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telephone</label>
                                <div class="controls">
                                    <input type="text" name="telephone" class="form-control" data-validation-required-message="This field is required" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cellphone</label>
                                <div class="controls">
                                    <input type="text" name="cellphone" class="form-control" data-validation-required-message="This field is required" >
                                </div>
                            </div>
                        </div>
                    </div>



                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm" id="add-employee-btn">Save changes</button>
            
                </div>
            </form>  
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


            // // Encrypt
            // var ciphertext = CryptoJS.AES.encrypt('my message', 'secret key 123');

            // // Decrypt
            // var bytes = CryptoJS.AES.decrypt(ciphertext.toString(), 'secret key 123');
            // var plaintext = bytes.toString(CryptoJS.enc.Utf8);
            // console.log(ciphertext);
            // console.log(plaintext);

            //console.log(btoa("id=117"));

           //console.log(atob("Y2F0ZWdvcnk9dGV4dGlsZSZ1c2VyPXVzZXIx"));



            fetchStudent();
            $('.btn-delete-employee').on('click', function(e){
              //  e.preventDefault();
               // alert('asdsa')
                var id = $(this).data('id');
               
                $('#delete_id').val(id);
                 $('#delete-employee-modal').modal('show');
            });


                function fetchStudent(){
                    $.ajax({
                    url: '/api/employee',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response){
                        console.log('response:',response);

                        if(response.status === 200){

                        }else{
                            console.log('NO DATA IN EMPLOYEE');
                        }
                       $.each(response.data , function (key, item){

                        $('tbody').append('<tr>\
                        <td><div class="dropdown">\
                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>\
                                <div class="dropdown-menu dropdown-menu-right">\
                                    <a class="dropdown-item" href="/employee/edit/'+btoa(item.id)+'"><i class="bx bx-edit-alt mr-1"></i> edit</a>\
                                    <a class="dropdown-item btn-delete-employee" href="#" data-id="'+item.id+'"><i class="bx bx-trash mr-1"></i> delete</a>\
                                </div>\
                            </div></td>\
                        <td>'+item.FirstName+'</td>\
                        <td>'+item.MiddleName+'</td>\
                        <td>'+item.LastName+'</td>\
                        <td>'+item.Sex+'</td>\
                        <td>'+item.EmailAddress+'</td>\
                        <td>'+item.Phone+'</td>\
                        <td>'+item.Cellphone+'</td>\
                        <td>'+item.EmploymentStatus+'</td>\
                        <td>'+item.EmploymentStatus+'</td>\
                        </tr>');
                       });  
                    } 
                });

                }
            
            
            $('#confirm-delete-employee').on('click', function(e){
                e.preventDefault();
                $.ajax({
                    url: '/api/employee/delete',
                    method: 'post',
                    data: $('#delete-employee-form').serialize(),
                    // processData: false,
                    // dataType: false,
                    // contentType: false,
                    beforeSend:function(){
                         $('#confirm-delete-employee').text('Deleting...');
                    },
                    success:function(data){
                     
                         if(data.status === 200){
                          //  $('#add-employee-form')[0].reset();
                            //alert(data.msg);
                         //   $('#countries-table').DataTable().ajax.reload(null,false);
                         $('#delete-employee-modal').modal('hide');
                            toastr.success(data.msg);
                        }
                         window.location.href = '/employee'
                        
                        $('#confirm-delete-employee').text('Okay');

                    }

                });

            });
            $('#add-employee-btn').on('click', function(e){
                e.preventDefault();
                $.ajax({
                    url: 'http://localhost:8000/api/employee/create',
                    method: 'post',
                    data: $('#add-employee-form').serialize(),
                    // processData: false,
                    // dataType: false,
                    // contentType: false,
                    beforeSend:function(){
                       // $(form).find('span.error-text').text('');
                    },
                    success:function(data){
                     
                        console.log("data:::",data);
                        if(data.status === 401){
                            $.each(data.error, function(prefix,val){
                                $('#add-employee-form').find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else if(data.status === 200){
                          //  $('#add-employee-form')[0].reset();
                            //alert(data.msg);
                         //   $('#countries-table').DataTable().ajax.reload(null,false);
                         $('#add-employee').modal('hide');
                            toastr.success(data.msg);
                        }else {
                           window.location.href = '/employee'
                        }

                    }

                });
            });

        });
 </script>
@endpush
@endsection