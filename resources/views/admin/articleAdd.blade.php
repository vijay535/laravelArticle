@extends('layouts.app')

@section('content')
<style type="text/css">
	.error{font-size: 14px;
    color: red;}
</style>
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

                    @if ($message = Session::get('success'))
				        <div class="alert alert-success">
				            <p>{{ $message }}</p>
				        </div>
			     	@endif
                    <form action="articleStore" method="post" enctype="multipart/form-data">
                    	@csrf
					  <div class="form-group">
					    <label for="title">Title:</label>
					    <input type="text" class="form-control" name="title">
					    @if($errors->has('title'))
						    <div class="error">{{ $errors->first('title') }}</div>
						@endif
					  </div>
					  <div class="form-group">
					    <label for="desc">Description:</label>
					    <textarea id="mytextarea" class="form-control" name="description"></textarea>
					    @if($errors->has('description'))
						    <div class="error">{{ $errors->first('description') }}</div>
						@endif
					  </div>
					  <div class="form-group">
					    <label for="tag">Tag:</label>
					    <input type="text" class="form-control" name="tag">
					     @if($errors->has('tag'))
						    <div class="error">{{ $errors->first('tag') }}</div>
						@endif
					  </div>
					  <div class="form-group">
					    <label for="title">Upload Photo:</label>
					    <input type="file" class="form-control" name="photo">
					     @if($errors->has('photo'))
						    <div class="error">{{ $errors->first('photo') }}</div>
						@endif
					  </div>

					  <button type="submit" class="btn btn-success">Submit</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
	tinymce.init({
	selector: '#mytextarea'
	});
</script>
@endsection
