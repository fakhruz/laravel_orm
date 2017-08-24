<div class="container">
	<a href="{{ route($route.'.create') }}" class="btn btn-success pull-right">Tambah</a>
	<br>

	<div class="table-responsive">
		<table class="table table-condensed table hover">
		<thead>
			<tr>
				<th>Bil</th>
			@foreach($heading as $heads)
				<th>{{ $heads['label'] }}</th>
			@endforeach
				<th>Tindakan</th>
			</tr>

		</thead>
		<tbody>
			@php $i = 1 @endphp
			@foreach($resource as $index => $res)
			<tr>
				<td>{{ $i }}</td>
				@foreach($heading as $heads)
					<td>{{ $res->{$heads['attr']} }}</td>
				@endforeach
				<td>
				@include('components.actions', ['resource' => $res])
				</td>
			</tr>
			@php $i++ @endphp
			@endforeach

		</tbody>

		</table>

	</div>
</div>