{!! Form::open(['method' => 'DELETE', 'route' => [$route.'.destroy', $resource->id]]) !!}
<div class="btn-group">
	<a href="{{ route($route.'.show',['id'=>$resource->id]) }}" class="btn btn-default">Papar</a>

	<a href="{{ route($route.'.edit',['id'=>$resource->id]) }}" class="btn btn-primary">Kemaskini</a>
@if($resource->id != "2")
	<button onclick="if(!confirm('Pasti untuk delete?')){return false;}" href="javascript:void(0)" class="btn btn-danger">Padam</button>
@endif
</div>
{!! Form::close() !!}