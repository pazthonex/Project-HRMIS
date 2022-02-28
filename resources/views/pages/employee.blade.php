@extends('layouts.admin')
 @section('content')
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employee Table</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table" style="width: 100%">
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
                                            <td><button class="">Edit</button></td>
                                            <td>{{ $employee->FirstName }}</td>
                                            <td>{{ $employee->MiddleName }}</td>
                                            <td>{{ $employee->LastName }}</td>
                                            <td>{{ $employee->Sex }}</td>
                                            <td>{{ $employee->Email }}</td>
                                            <td>{{ $employee->Phone }}</td>
                                            <td>{{ $employee->Cellphone }}</td>
                                            <td>{{ $employee->EmploymentStatus }}</td>
                                            <td>Department}</td>
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
</section>

@endsection