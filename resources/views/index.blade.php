@extends('layouts.app')

@section('content')

<div class="row w-100  bg-dark ml-0">
	<div class="col-12 h-25 d-flex justify-content-center head">
		<div class="w-50 text-center text-light h1 text-decoration-none header">
			<div class="float-left">
				<a id="previous" data-page="{{$page-1}}" class="btn btn-primary"><-</a>
			</div>
            <div class="float-right">
                <a id="next" data-page="{{$page+1}}" class="btn btn-primary">-></a>
            </div>
			<div class="monthName">{{$monthName}}</div>

		</div>
	</div>
</div>

@include('includes.habits')

@endsection
