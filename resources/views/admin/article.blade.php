@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a style="margin: 0 19px;" href="{{ url('/article') }}">{{ __('Article') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ url('/articleAdd') }}" class="btn btn-primary" style="float: right; margin-bottom: 5px;">Add Article</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <table class="table table-bordered">
				    <thead>
				      <tr>
				        <th>Sn.</th>
				        <th>Title</th>
				        <th>Description</th>
				        <th>Photo</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
			    	<?php
			    		$sr=1;
			    		foreach ($articles as $row) {	
			    	 ?>
				      <tr>
				        <td>{{ $sr }}</td>
				        <td>{{ $row->title }}</td>
				        <td><?php echo substr($row->description, 0,200); ?></td>
				        <td><img src="public/images/{{ $row->image }}" style="    width: 100px;"></td>
				        <td><a href="articleEdit/{{ $row->id }}">Edit</a> || 
				        	<a href="articleDelete/{{ $row->id }}">Delete</a></td>
				      </tr>
				    <?php $sr++; } ?>
				    </tbody>
				  </table>
				  {!! $articles->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
