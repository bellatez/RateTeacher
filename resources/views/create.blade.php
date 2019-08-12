@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action={{Route('store')}}>
                        @csrf
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="title" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title">
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
