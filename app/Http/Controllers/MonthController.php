<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Month;

class MonthController extends Controller
{
    public function index()
    {
        $months = Month::paginate(3);

        return view('months.index', compact('months'));
    }

    public function create()
    {
        return view('months.create');
    }
    public function store (Request $request)
    {
        Month::create($request->all());

        return redirect()->back()->with('success','Month created successfully.');
    }
}
