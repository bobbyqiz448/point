@extends('layouts.app')
@section('content')
<div class="card w-50  " >
  <div class="card-header">Create Contact </div>
  <div class="card-body">
      
      <form action="{{ url('contact/store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Name</label><br>
        <input type="text" name="fullName" id="fullName" class="form-control"><br>
        <label>Phone Number</label><br>
        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control"><br>
        <label>E-mail</label><br>
        <input type="email" name="email" id="email" class="form-control"><br>
        <label>Contact Image</label><br>
        <input class="form-control" name="imgPath" type="file" id="imgPath">
 
        
        <div class="justify-between flex items-center" style="display: flex; justify-content:space-between">
          <input type="submit" value="Save" class="btn btn-success mt-4 ps-4 pe-4 ms-5">
          <a href="/dashboard"><span  class="btn btn-primary mt-4 ps-4 pe-4 me-5">Back</span></a>
        </div><br>
    </form>
  
  </div>
</div>
@stop