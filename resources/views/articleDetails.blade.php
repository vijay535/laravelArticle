@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		
	    <div class="col-md-12">
	      <div class="card mb-4 box-shadow">
	        <img class="card-img-top" style="height: auto; width: 100%;" src="http://localhost/laravelArticle/public/images/1613680524.png" data-holder-rendered="true">
	        <div class="card-body">
	          <small class="text-muted">Tag: {{ $findArticleDetails->tag }}</small>
	          <?php echo $findArticleDetails->description; ?>
	          <div class="d-flex justify-content-between align-items-center">
	          </div>
	        </div>
	      </div>
	    </div>
	    

	</div>
	
</div>
@endsection
