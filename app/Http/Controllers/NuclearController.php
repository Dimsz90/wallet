<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Saving;
    use App\Models\Student;
    use App\Models\User;
    use App\Models\Month;
    
    
    class NuclearController extends Controller
    {
        public function index()
        {
            $savings = Saving::all();
            $students = Student::all();
            $users = User::all();
            $months = Month::all();
        
            return view('nuclears.index', compact('savings', 'students', 'users' , 'months'));
        }
    
        public function destroy()
{
    

    Saving::query()->truncate();
    Student::query()->truncate();
    User::query()->truncate();
    Month::query()->truncate();

    

    return redirect()->route('nuclears')->with('success', 'All data deleted successfully.');
}
    }
    