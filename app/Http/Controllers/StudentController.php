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
       
        $old_image = public_path('images/'. $student->image);
        if(\File::exists($old_image)) {
            \File::delete($old_image);
        }
        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'images/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = $profileImage;
        }else{
            unset($input['image']);
        }
        $users = $student->user;

        $users->name = $request->name;

     $users->save();

        $student->update($input);
        return redirect()->route('students')
                            ->with('success','Student updated successfully');
    }

    public function destroy(Request $request,$id)
    {
        $student = Student::findOrFail($id);
        $user = $student->user; // dapetin user sesuai student
    
        if ($student->image) {
            // Hapus gambar dari direktori
            $image_path = public_path('images/'.$student->image);  // Value is not URL but directory file path
            if(\File::exists($image_path)) {
                \File::delete($image_path);
            }
        }
    
        $student->delete($request->all());
    
        $user->delete();
    
        return redirect()->back();  
    }
    
  
}
