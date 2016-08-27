@if(Session::has('error-message'))
<script>
	$(function(){
		$.growl.error({"title":"Error","message":"{{Session::get('error-message')}}"});
	})
</script>
@endif