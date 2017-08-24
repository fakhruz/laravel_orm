@extends('layouts.app')

@section('content')
	@include('components.list',[
		'route' => 'users',
		'resource' => $detail_users,
		'heading' =>[
			[
				'label'=>'Nama',
				'attr' => 'name',

			],
			[
				'label' => 'E-mail',
				'attr' => 'email',

			],
			[
				'label' => 'Tarikh',
				'attr' => 'created_at',
			],
		]
	])

@endsection