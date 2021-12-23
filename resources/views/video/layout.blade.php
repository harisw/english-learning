<!DOCTYPE html>

<html>
<head>
<title>English Video Learning</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
@yield('content')
</div>
</body>
<script>
$(document).ready(function () {

/* When click New video button */
$('#new-video').click(function () {
$('#btn-save').val("create-video");
$('#video').trigger("reset");
$('#videoCrudModal').html("Add New Customer");
$('#crud-modal').modal('show');
});

/* Edit video */
$('body').on('click', '#edit-video', function () {
var video_id = $(this).data('id');
$.get('video/'+video_id+'/edit', function (data) {
$('#videoCrudModal').html("Edit video");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#cust_id').val(data.id);
$('#name').val(data.name);
$('#email').val(data.email);
$('#address').val(data.address);
})
});
/* Show video */
$('body').on('click', '#show-video', function () {
$('#videoCrudModal-show').html("Customer Details");
$('#crud-modal-show').modal('show');
});

/* Delete video */
$('body').on('click', '#delete-video', function () {
var video_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");

$.ajax({
type: "DELETE",
url: "http://localhost/laravel7crud/public/video/"+video_id,
data: {
"id": video_id,
"_token": token,
},
success: function (data) {
$('#msg').html('Customer entry deleted successfully');
$("#video_id_" + video_id).remove();
},
error: function (data) {
console.log('Error:', data);
}
});
});
});

</script>
</html>
