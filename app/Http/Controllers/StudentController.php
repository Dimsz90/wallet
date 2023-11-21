<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required',
            'kelas' => 'required',
            'phone' => 'required',
        ]);

        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'images/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";
        }
            Student::create($input);
            return redirect()->route('students')->with('success','Student created successfully.');
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }
    public function update(Request $request,Student $student)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required',
            'kelas' => 'required',
            'phone' => 'required',
        ]);
        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'images/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = $profileImage;
        }else{
            unset($input['image']);
        }

        $student->update($input);
        return redirect()->route('students')
                            ->with('success','Student updated successfully');
    }

    public function destroy(Request $request,$id)
    {
        $student = Student::findOrFail($id);

        if ($student->image) {
            $this->deleteImage($student->image);
        }

        $student->delete($request->all());

        return redirect()->back();
    }
    public function deleteImage($imageName)
    {
        $path = public_path('images/' . $imageName);

        if (file_exists($path)) {
            unlink($path);

        }
    }
}
