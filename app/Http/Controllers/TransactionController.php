<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saving;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(5);

        return view('transactions.index', compact('transactions'));
    }
    public function create($id)
    {
        $saving = Saving::findOrFail($id);

        return view('transactions.create', compact('saving'));
    }
    public function store(Request $request, $id)
    {
        $saving = Saving::findOrFail($id);

        if($saving != null){
            $transactions = Transaction::create([
                'saving_id' => $id,
                'nominal'   => $request->input('nominal'),
                'status'    => $request->input('status'),
            ]);
        }

        return redirect()->back();
    }
}

