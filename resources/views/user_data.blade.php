<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>User Details</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<!-- <script src="jquery-3.7.1.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
.error {
            color: red;
        }
</style>
<script>
$(document).ready(function(){
    let table = new DataTable('#user_table');
});
</script>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>User</b></h2>
					</div>
					<div class="col-sm-6">
						<!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a> -->
						<a href="" class="btn btn-danger logout" data-toggle="modal"><span>Logout</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover" id="user_table">
				<thead>
					<tr>
						
						<th>Name</th>
						<th>Email</th>
						<th>Mobile No.</th>
						<th>Gender</th>
						<th>Employee Type</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone_number}}</td>
                            <td>{{$value->gender}}</td>
                            <td>{{$value->employee_type}}</td>
                            <td>
                                <a href="#editEmployeeModal" class="edit"
                                        data-user_id="{{$value->id}}"
                                        data-name="{{$value->name}}"
                                        data-email="{{$value->email}}" 
                                        data-phone_number="{{$value->phone_number}}" 
                                        data-gender="{{$value->gender}}" 
                                        data-employee_type="{{$value->employee_type}}" 
                                    data-toggle="modal">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                                <a href="#deleteEmployeeModal" class="delete" 
                                    data-delete_id="{{$value->id}}" 
                                    data-toggle="modal">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
		</div>
	</div>        
</div>

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="edit_user_form">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
				<div class="form-group">
						<label>Name</label>
						<input type="hidden" id="user_id" name="user_id" >
						<input type="text" name="name" class="form-control"  >
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control"  >
					</div>
					<div class="form-group">
						<label>Mobile No.</label>
						<input type="number" class="form-control" name="phone_number" maxlength="10" pattern="\d{10}">
					</div>	
                    <div class="form-group">
                        <label>Gender</label><br>
                        <input type="radio" id="male" name="gender" value="male"  >
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                    </div>
                    <div class="form-group">
                        <select class="select" name="employee_type">
                            <option disabled selected value="">Choose Employee Type</option>
                            <option value="it">IT</option>
                            <option value="hr">HR</option>
                            <option value="management">Management</option>
                            <option value="sales">Sales</option>
                            <option value="marketing">Marketing</option>
                        </select>
                        <label class="form-label select-label">Choose Employee Type</label>
                    </div>
				</div>
				
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="delete_user_id" id="delete_user_id">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" id="user_delete_btn" value="Delete">
				</div>
                
			</form>
		</div>
	</div>
</div>
</body>

<script>
    $(document).on("click", ".edit", function () {
        // Clear previous address fields
        $('.edit-address-container').empty();
        var user_id = $(this).data('user_id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var phone_number = $(this).data('phone_number');
        var gender = $(this).data('gender');
        var employee_type = $(this).data('employee_type');

        console.log(employee_type);
        // Populate the modal fields
        $('#edit_user_form [name="user_id"]').val(user_id);
        $('#edit_user_form [name="name"]').val(name);
        $('#edit_user_form [name="email"]').val(email);
        $('#edit_user_form [name="phone_number"]').val(phone_number);
        $(`#edit_user_form [name="gender"][value="${gender}"]`).prop('checked', true);
        $('#edit_user_form select[name="employee_type"]').val(employee_type).change();
    });

    $("#edit_user_form").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            phone_number: {
                required: true,
                digits: true,
                maxlength: 10
            },
            gender: "required",
            employee_type: {
                required: true
            },
        },
        messages: {

            name: "Please Enter Name",
            email: {
                required: "Please Enter Email",
                email: "Please enter a valid Email"
            },
            phone_number: {
                required: "Please Enter Mobile No",
                digits: "Please enter only numbers",
                maxlength: "Mobile number must be no more than 10 digits"
            },
            gender: "Please select your gender",
            employee_type: {
                required: "Please choose an employee type"
            },
        },
        submitHandler: function(form) {

        var formData = new FormData(form);
        $.ajax({
            url: "{{ route('edit_user_data') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(result) {
                // alert(result.message);
                if (result.success) {
                    toastr.success(result.message);
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                    form.reset();
                }
            },
            error: function(xhr) {
              // Handle errors
              if (xhr.status === 422) { // Laravel validation error status
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        toastr.error(value[0]); // Display each validation error message
                    });
                } else {
                    toastr.error('An error occurred. Please try again.');
                }
            }
        });
        }

    });

    $(".logout").click(function(){
        Swal.fire({
            title: 'Are you sure want to logout?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Logout'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{route('logout')}}',
                    method: 'GET',
                    success: function(resp) {
                        if (resp.success) {
                            toastr.success(resp.message);
                            setTimeout(() => {
                                window.location.href = "{{route('user_login')}}";
                            }, 1000);
                        } else {
                            toastr.error(resp.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('An error occurred while deleting.');
                    }
                });
            }
        });
    });

    $(document).on("click", ".delete", function () { 

        var delete_user_id = $(this).data('delete_id');

        // alert(delete_user_id);

        $('#delete_user_id').val(delete_user_id);

    });

    $(document).on("click", "#user_delete_btn", function (e) {
        e.preventDefault();
        var deleteUserId = $('#delete_user_id').val();

        $.ajax({
            url: "{{ route('delete_user') }}",
            type: "POST",
            data: {
                user_id: deleteUserId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                if (result.success) {
                    toastr.error(result.message);
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                } else {
                    // Handle error
                    alert(result.message);
                }
            },
            error: function(xhr) {
                toastr.error('An error occurred. Please try again.');
            }
        });
    });
</script>
</html>