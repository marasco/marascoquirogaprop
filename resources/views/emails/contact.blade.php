@if (!empty($data['property_code']))
	<p>Codigo de la propiedad: {{ $data['property_code'] }}</p>
@endif
<p>Nombre: {{ $data['name'] }}</p>
<p>Email: {{ $data['email'] }}</p>
<p>Telefono: {{ $data['phone'] }}</p>
<p>Mensaje: {{ $data['message'] }}</p>
