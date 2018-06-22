<h2>hola admin</h2>
<p>La suma es: {{$var}} </p>
<p>La resta es: {{$res}} </p>
<ul>
	@foreach ($array as $user)
    	<li>Dato {{ $user }}</li>
	@endforeach
</ul>
