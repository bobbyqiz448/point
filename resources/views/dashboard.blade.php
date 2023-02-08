@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="container flex justify-center flex-column mt-4">
    <div class="contact-card ">
        <div class="card">
            <div class="card-header">My Contacts</div>
            <div class="card-body">
                <a href="{{url('/contact/create')}}" class="btn btn-success btn-sm" title="Add New Contact">
                    <i class="fa fa-plus" aria-hidden="true"></i>Add New
                </a>
                <br><br>
                <div class="table-responsive ">
                    <div class="table" >
                        <table class="w-100 ">
                        <thead>
                            <tr class="">
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Phone Number(s)</th>
                                <th>E-mail</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($contacts as $item)

                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->fullName}}</td>
                                <td>{{$item->phoneNumber}}</td>
                                <td>{{$item->email}}</td>
                                <td><img src="{{$item->imgPath}}" alt="image"></td>
                                <td>
                                    <a href="{{url('/contacts/' .$item->id)}}" title="View Student"><button class="btn btn-info btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i>View Contact</button></a>
                                    <a href="{{url('/contacts/' .$item->id. '/edit')}}" title="Edit Student"><button class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>View Contact</button></a>

                                    <form method="POST" action="{{url('/contacts/' .$item->id)}}" accept-charset="UTF-8" style="display: inline">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn-danger btn btn-sm" title="Delete Contact" onclick="return confirm()&quot; Confirm Delete? &quot;"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
