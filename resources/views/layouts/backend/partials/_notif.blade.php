@if ($status = Session::get('status'))
<div class="alert alert-{{ $status }} alert-block alert-notif">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ Session::get('message') }}</strong>
</div>

<script>
	window.setTimeout(function() {
    	$(".alert-notif").fadeTo(500, 0).slideUp(500, function(){
        	$(this).remove(); 
    	});
	}, 4000);
</script>
@endif