<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Role;
    use App\Models\Student;


    class UserController extends Controller
    {
        public function index()
        {
            
            $users = User::with('students')->role(['siswa','bendahara'])->get();
            return view('users.index', compact('users'));
        }
        public function create()
        {
            $roles = Role::all();

            return view('users.create', compact('roles'));
        }
        public function store(Request $request)
        {
            $this->validate($request,[
                'name'                   => 'required',
                'email'                  => 'required|email|unique:users,email',
                'password'               => 'required',
                'phone'                  => 'required',
                'alamat'                 => 'required',
                'kelas'                  => 'required',
                'image'                  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            
            $user = User::create([
                'name'                   =>  $request->input('name'),
                'email'                  =>  $request->input('email'),
                'password'               =>  bcrypt($request->get('password')),
                'email_verified_at'      =>  now(),
            ]);

            if($image = $request->file('image')){
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
            }

            $student = Student::create([
                'user_id'       => $user->id,
                'phone'         => $request->input('phone'),
                'alamat'        => $request->input('alamat'),
                'kelas'         => $request->input('kelas'),
                'image'         => "$profileImage",
            ]);
            
            $request->except('roles');
            $roleId = $request->get('roles');
            $role = Role::findById($roleId);
            $user->assignRole($role->name);

        
            return redirect()->back()->with('flash', 'data siswa berhasil ditabahkan');
        }
    }

