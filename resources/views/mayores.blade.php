<html>


 <body>

<table>
<tr>
  <td><strong>id</strong></td>
  <td><strong>nombre</strong></td>
  <td><strong>fecha</strong></td>
  <td><strong>email</strong></td>
  <td><strong>numero telefono</strong></td>
  <td><strong>oficina</strong></td>
  
</tr>
@foreach($mayoresnumber as $valor)


<tr>
 <td><strong>{{$valor->id}}</strong></td>
  <td><strong>{{$valor->name}}</strong></td>
  <td><strong>{{$valor->date}}</strong></td>
  <td><strong>{{$valor->email}}</strong></td>
  <td><strong>{{$valor->number}}</strong></td>
  <td><strong>{{$valor->office}}</strong></td>
 
</tr>
@endforeach 
</table>
 </body>




</html>