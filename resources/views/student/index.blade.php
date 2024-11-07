@extends('layouts.master')

@section('title', 'Student List')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h2 class="fw-bold">CRUD LARAVEL
                    <a href="{{ route('student.add') }}" class="float-end btn btn-light">Add Student</a>
                </h2>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    @if(session('status')=='success')
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Class</th>
                                <th scope="col">Profile Picture</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->fullName}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->className}}</td>
                                <td>
                                    <img src="{{ asset('uploads/students/'.$student->profilePicture) }}" width="100px" class="img-thumbnail img-fluid rounded-circle" style="object-fit: cover;">
                                </td>
                                <td>
                                    <a href="{{route('student.edit',['id'=>$student->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                    <form method="post" action="{{route('student.delete', ['id' => $student->id])}}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @if($students->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">No students found</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection