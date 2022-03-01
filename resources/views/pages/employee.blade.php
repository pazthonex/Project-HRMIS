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
                            <table class="table zero-configuration" style="width: 100%">
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
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>
                                                <div class="d-flex" >
                                                    <a href="{{ route('employee.edit',['id' => $employee->id]) }}" class="text-info">edit </a> |  
                                                    <a href="{{ route('employee.edit',['id' => $employee->id]) }}" class="text-danger"> delete</a>
                                                  </div>
                                            </td>
                                            <td>{{ $employee->FirstName }}</td>
                                            <td>{{ $employee->MiddleName }}</td>
                                            <td>{{ $employee->LastName }}</td>
                                            <td>{{ $employee->Sex }}</td>
                                            <td>{{ $employee->Email }}</td>
                                            <td>{{ $employee->Phone }}</td>
                                            <td>{{ $employee->Cellphone }}</td>
                                            <td>{{ $employee->EmploymentStatus }}</td>
                                            <td>
                                                {{$employee->Department}}
                                            </td>
                                          
                                        </tr>
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="add-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="{{ route('employee.add') }}" method="post" id="add-employee-form" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-content">
                    
                            
                        <div class="card-body">
                          
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
                                            <label>Current Item</label>
                                            <div class="controls">
                                                <select class='form-control  border-input'  name='currentitem'  data-validation-required-message="This field is required"  >
                                                        <option value='1' >Current Item 01</option>
                                                        <option value='2' >Current Item 02</option>
                                                        <option value='3' >Current Item 03</option>
                                                    </select>
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
                            </form>
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
            $('#add-employee-btn').on('click', function(e){
                e.preventDefault();

                //var form = this;
              ///  console.log(form);
                $.ajax({
                    url: '/employee/create',
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
                        if(data.code == 0){
                            $.each(data.error, function(prefix,val){
                                $('#add-employee-form').find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                          //  $('#add-employee-form')[0].reset();
                            //alert(data.msg);
                         //   $('#countries-table').DataTable().ajax.reload(null,false);
                         $('#add-employee').modal('hide');
                            toastr.success(data.msg);
                        }

                    }

                });
            });

        });
 </script>
@endpush
@endsection