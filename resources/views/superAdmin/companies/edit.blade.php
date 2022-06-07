@extends('admin.layouts.master')
@section('content')
   <div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Edit Company
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('companies.index') }}">Company</a>
                </span>
            </div>

            <div class="card-body">


    <form action="{{ route('companies.update',$companies->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Company Name:</strong>
		            <input type="text" name="compnay_name" value="{{$companies->compnay_name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Company Image:</strong>
		            <input type="file" name="picture" value="{{$companies->picture}}" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $companies->detail }}</textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>



@endsection
