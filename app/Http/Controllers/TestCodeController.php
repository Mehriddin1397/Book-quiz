<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TestCode;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class TestCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $codes = TestCode::all();
        return view('admin.code.index', compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('code.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        TestCode::create($request->all());
        return redirect()->route('code.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestCode $code)
    {
        return view('admin.code.edit', compact('code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestCode $code)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $code->update($request->all());
        return redirect()->route('code.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestCode $code)
    {
        $code->delete();
        return redirect()->route('code.index');
    }



}
