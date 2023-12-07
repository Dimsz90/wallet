<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Saving;
use App\Models\Month;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Models\User;



class SavingController extends Controller
{
       public function index()
    {
        $savings = Saving::with(['student', 'month'])
                    ->join('students', 'students.id', '=', 'savings.student_id')
                    ->join('months', 'months.id', '=', 'savings.month_id')
                    ->orderBy('students.kelas')
                    ->orderBy('months.name')
                    ->get()
                    ->groupBy('student_id')
                    ->map(function ($group) {
                        $totalPayment = $group->sum(function ($saving) {
                            return intval(str_replace('.', '', $saving->nominal));
                        });
                        return [
                            'id' => $group->first()->id,
                            'name' => $group->first()->student->user->name,
                            'kelas' => $group->first()->student->kelas,
                            'nameM' => $group->first()->month->name,
                            'nominal' => $totalPayment,
      
                        ];
                    })
                    ->values();
        return view('savings.index', compact('savings'));
    }

    
    public function create($id)
    {
        $data = [
            'month' => Month::findOrFail($id),
            'users'  => User::all(),
        ];

        return view('savings.create', $data);
    }

    public function store (Request $request, $id)
    {
        $month = Month::findOrFail($id);

        $studentIds = $request->input('student_id');
        $nominals = $request->input('nominal');

        foreach ($studentIds as $key => $studentId) {
            $student = new Saving();
            $student->student_id = $studentId;
            $student->month_id = $id;
            $student->nominal = $nominals[$key] ?? '' ;
            $student->save();
        }

        return redirect()->back();
    }
    

    
    public function printPDF(Request $request)
    {
        $dari_tgl = $request->input('dari_tgl');
        $sampai_tgl = $request->input('sampai_tgl');
    
        $query = Saving::with(['student', 'month'])
         ->whereHas('student')
            ->orderBy('student_id')
            ->orderBy('month_id');
    
        if ($dari_tgl && $sampai_tgl) {
            $query->whereBetween('created_at', [$dari_tgl, $sampai_tgl]);
        }
    
        $savings = $query->get()
            ->groupBy(function($item){
                return $item['student_id'] . '-' . $item['month_id'] ;
            })
            ->map(function ($group) {
                $totalPayment = $group->sum(function ($saving) {
                    return intval(str_replace('.', '', $saving->nominal));
                });
                return [
                    'name' => $group->first()->student->user->name,
                    'kelas' => $group->first()->student->kelas,
                    'nameM' => $group->first()->month->name,
                    'nominal' => $totalPayment,

                  
                ];
            })
            ->values();

        $pdf = new TCPDF;

        $pdf::SetFont('helvetica', '', 12);

        $pdf::SetTitle('Laporan Periode Tabungan');
        $pdf::AddPage();
        $pdf::writeHTML(view('savings.print', compact('savings'))->render());
        $pdf::Output('savings.pdf', 'i');
    }
    public function printByName($name)
    {

        $user = User::where('name', $name)->first();
    
        $savings = Saving::with(['student', 'month'])
            ->whereHas('student', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get()
            ->groupBy(function($item){
              return $item['student_id'] . '-' . $item['month_id'];
            })
            ->map(function ($group) {
                $totalPayment = $group->sum(function ($saving) {
                    return intval(str_replace('.', '', $saving->nominal));
                });
                return [
                    'id' => $group->first()->id,
                    'name' => $group->first()->student->user->name,
                    'kelas' => $group->first()->student->kelas,
                    'nameM' => $group->first()->month->name,
                    'nominal' => $totalPayment,
                ];
            })
            ->values();
    
        // Buat PDF
        $pdf = new TCPDF;
        $pdf::SetTitle('Laporan Tabungan');
        $pdf::AddPage();
        $pdf::writeHTML(view('savings.printByName', compact('savings'))->render());
        $pdf::Output('saving.pdf', 'i');
    }


}



