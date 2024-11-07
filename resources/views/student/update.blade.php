@extends('layouts.master')

@section('title', 'Update Student')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h2 class="fw-bold">UPDATE STUDENT <a href="{{ route('student.index') }}" class="float-end btn-light btn">Back</a></h2>
            </div>
            <div class="card-body">
                <form action="{{ route('student.update', ['id' => $student->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" name="fullName" placeholder="Enter full name..." value="{{$student->fullName}}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email..." value="{{$student->email}}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Class:</label>
                        <input type="text" class="form-control" name="className" placeholder="Enter class..." value="{{$student->className}}" required>
                    </div>
                    <div class="form-group mb-3">
                        <img src="{{ asset('uploads/students/'.$student->profilePicture) }}" width="70px" class="img-thumbnail img-fluid">
                        <div class="mb-3"></div>
                        <label for="" class="form-label">Profile Picture:</label>
                        <input type="file" class="form-control" name="profilePicture">
                    </div>
                    <div class="form-group mb-3">
                        @if(session('status')=='success')
                        <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary form-control">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection