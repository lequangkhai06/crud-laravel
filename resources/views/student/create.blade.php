@extends('layouts.master')

@section('title', 'Create Student')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h2 class="fw-bold">CREATE STUDENT <a href="{{ route('student.index') }}" class="float-end btn-light btn">Back</a></h2>
            </div>
            <div class="card-body">
                <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" name="fullName" placeholder="Enter full name...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Class:</label>
                        <input type="text" class="form-control" name="className" placeholder="Enter class...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Profile Picture:</label>
                        <input type="file" class="form-control" name="profilePicture">
                    </div>
                    <div class="form-group mb-3">
                        @if(session('status')=='success')
                        <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary form-control">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection