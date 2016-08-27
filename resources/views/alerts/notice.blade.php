@if(Session::has('message'))
<script>
	$(function(){
		$.growl.notice({"title":"Bien","message":"{{Session::get('message')}}"});
	})
</script>
@endif