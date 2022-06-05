@extends('layouts.app')


@section('content')
    <div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
           <div class="card-header">Company
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('companies.create') }}">New Company</a>
                    </span>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>

            <th>Name</th>
             <th>Image</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($companies as $comp)
	    <tr>
            {{-- {{dd(App\Models\User::whereNotNull('company_id')->first())}}; --}}


	        <td>{{$comp->compnay_name}}</td>
	        <td style="padding: 5px"><img src="{{asset('uploads/conpany/'.$comp->picture)}}" style="width: 90%; height:80px;object-fit:cover;
}"  alt=""> </td>
            <td>{{$comp->detail}}</td>
	        <td>
                <form action="{{ route('companies.destroy',$comp->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('companies.show',$comp->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('companies.edit',$comp->id) }}">Edit</a>




                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!!$companies->links() !!}


@endsection
