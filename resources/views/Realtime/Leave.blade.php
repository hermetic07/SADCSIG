<!DOCTYPE html>
<html>
<head>
<title>Ajax CRUD in laravel - justlaravel.com</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="{{asset('js/jquery.min.js')}}"></script>
<script
	src="{{asset('js/bootstrap.min.js')}}"></script>

</head>
<style>
.table-borderless tbody tr td, .table-borderless tbody tr th,
	.table-borderless thead tr th {
	border: none;
}
</style>
<body>
	<div class="container ">
		<div class="form-group row add">
			<div class="col-md-8">
				<input type="text" class="form-control" id="name" name="name"
					placeholder="Enter some name" required>
				<p class="error text-center alert alert-danger hidden"></p>
			</div>
			<div class="col-md-8">
				<input type="text" class="form-control" id="days" name="days"
					placeholder="Days" required>
				<p class="error text-center alert alert-danger hidden"></p>
			</div>
			<div class="col-md-8">
				<input type="text" class="form-control" id="notification" name="notification"
					placeholder="Notification Period" required>
				<p class="error text-center alert alert-danger hidden"></p>
			</div>
			<div class="col-md-4">
				<button class="btn btn-primary" type="submit" id="add">
					<span class="glyphicon glyphicon-plus"></span> ADD
				</button>
			</div>
		</div>
		{{ csrf_field() }}
		<div class="table-responsive text-center">
			<table class="table table-borderless" id="table">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Name</th>
            <th class="text-center">Days</th>
						<th class="text-center">Notification Period in Days</th>
            <th class="text-center">Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				@foreach($data as $item)
        @if($item->status !== "deleted")
				<tr class="item{{$item->id}}">
					<td>{{$item->id}}</td>
					<td>{{$item->name}}</td>
          <td>{{$item->days}}</td>
					<td>{{$item->notification}}</td>
          <td>{{$item->status}}</td>
					<td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
							data-name="{{$item->name}}" data-days="{{$item->days}}" data-notification="{{$item->notification}}">
							<span class="glyphicon glyphicon-edit"></span> Edit
						</button>
						<button class="delete-modal btn btn-danger"
							data-id="{{$item->id}}" data-name="{{$item->name}}">
							<span class="glyphicon glyphicon-trash"></span> Delete
						</button></td>
				</tr>
        @endif
				@endforeach
			</table>
		</div>
	</div>
	<div id="myModal" class="modal fade" Leave="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">Close</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" Leave="form">
						<div class="form-group">
							<label class="control-label col-sm-2" for="id">ID:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fid" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Name:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="n">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Days:</label>
							<div class="col-sm-10">
								<input type="name" class="form-control" id="d">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Notification Period:</label>
							<div class="col-sm-10">
								<input type="name" class="form-control" id="not">
							</div>
						</div>
					</form>
					<div class="deleteContent">
						Are you Sure you want to delete <span class="dname"></span> ? <span
							class="hidden did"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class='glyphicon'> </span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>
		<script>
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
				$('#d').val($(this).data('days'));
				$('#not').val($(this).data('notification'));
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: '/editLeave',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val(),
                'days': $('#d').val(),
								'notification': $('#not').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.days + "</td><td>" + data.notification + "</td><td>" + data.status + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addLeave',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val(),
								'days': $('input[name=days]').val(),
								'notification': $('input[name=notification]').val()
            },
            success: function(data) {
                if ((data.errors)){
                	$('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.days + "</td><td>" + data.notification + "</td><td>" + data.status + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#name').val('');
        $('#days').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteLeave',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
</script>

</body>
</html>
