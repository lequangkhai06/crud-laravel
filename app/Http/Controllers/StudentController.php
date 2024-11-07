<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function createStudent()
    {
        return view('student.create');
    }

    public function storeStudent(Request $request)
    {
        $student = new Student;
        $student->fullName = $request->input('fullName');
        $student->email = $request->input('email');
        $student->className = $request->input('className');
        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $extension = $file->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $file->move('uploads/students', $filename);
            $student->profilePicture = $filename;
        }
        $student->save();
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Student added successfully!'
        ]);
    }

    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function editStudent($id)
    {
        $student = Student::findOrFail($id);
        return view('student.update', compact('student'));
    }

    public function updateStudent(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->fullName = $request->input('fullName');
        $student->email = $request->input('email');
        $student->className = $request->input('className');

        if ($request->hasFile('profilePicture')) {
            $oldPic = 'uploads/students/' . $student->profilePicture;
            if (File::exists($oldPic)) {
                File::delete($oldPic);
            }
            $file = $request->file('profilePicture');
            $extension = $file->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $file->move('uploads/students', $filename);
            $student->profilePicture = $filename;
        }

        $student->save();
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Student update successful!'
        ]);
    }


    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $profilePicture = '/uploads/students/' . $student->profilePicture;
        if (File::exists(public_path($profilePicture))) {
            File::delete(public_path($profilePicture));
        }
        $student->delete();
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Student deleted successfully!'
        ]);
    }
}
