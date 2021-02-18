@extends('layouts.app')

@section('content')
<div class="container">
	
	<div class="row">
		@foreach ($frontArticles as $row)
	    <div class="col-md-4">
	      <div class="card mb-4 box-shadow">
	        <img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="public/images/{{ $row->image }}" data-holder-rendered="true">
	        <div class="card-body" style="text-align: center;">
	        	<h3>{{ $row->title }}</h3>
		        <small class="text-muted">Tag: {{ $row->tag }}</small> ||
		        <?php echo substr($row->description, 0, 300); ?>
	          	<div class="d-flex justify-content-between align-items-center">
	            <div class="btn-group">
	              <a href="articleDetails/{{ $row->id }}"class="btn btn-sm btn-outline-secondary">Read More</a>
	            </div>
	            <!-- <small class="text-muted">9 mins</small> -->
	          </div>
	        </div>
	      </div>
	    </div>
	    @endforeach

	</div>
	{!! $frontArticles->links() !!}
</div>
@endsection
