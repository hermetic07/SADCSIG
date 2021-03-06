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
					placeholder="Attribute name" required>
				<p class="error text-center alert alert-danger hidden"></p>
			</div>
			<div class="col-md-8">
				<select class="col-md-8" id="selection" name="selection">
					@foreach($mil as $d)
					<option value="{{$d->name}}">{{$d->name}}</option>
					@endforeach
				</select>
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
						<th class="text-center">Measurement used</th>
            <th class="text-center">Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				@foreach($data as $item)
        @if($item->status !== "deleted")
				<tr class="item{{$item->id}}">
					<td>{{$item->id}}</td>
					<td>{{$item->name}}</td>
					<td>{{$item->measurement}}</td>
          <td>{{$item->status}}</td>
					<td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
							data-name="{{$item->name}}" data-measurement="{{$item->measurement}}">
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
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">Close</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
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
							<label class="control-label col-sm-2" for="d">Measurement used:</label>
							<div class="col-sm-10">
								<select class="col-md-8" id="d" name="d">
									@foreach($mil as $d)
									<option value="{{$d->name}}">{{$d->name}}</option>
									@endforeach
								</select>
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
				$('#d').val($(this).data('measurement'));
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
            url: '/editAttribute',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val(),
								'selection': $('#d').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.measurement + "</td><td>" + data.status + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "' data-measurement='"+data.measurement+"'  ><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addAttribute',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val(),
								'selection': $('#selection').val(),
            },
            success: function(data) {
                if ((data.errors)){
                	$('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.measurement + "</td><td>" + data.status + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "' data-measurement='"+data.measurement+"'  ><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#name').val('');
        $('#description').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteAttribute',
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
