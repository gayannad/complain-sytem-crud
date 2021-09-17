<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainsController extends Controller
{
    /**
     * @var Complain
     */
    private $complain;

    public function __construct(Complain $complain)
    {
        $this->complain = $complain;
    }

    public function index()
    {
        $complains = $this->complain->paginate(2);
        return view('complains.index', ['complains' => $complains]);
    }

    public function create()
    {
        return view('complains.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required',
            'customer_age' => 'required',
            'customer_address' => 'required',
            'problem_description' => 'required',
            'date' => 'required',
        ]);

        try {
            $this->complain->create($request->all());
            return redirect()->route('complains.index')->with('success', 'Complain Created !');
        } catch (\Exception $e) {
            return redirect()->route('complains.index')->with('error', 'Error creating complain,try again !');
        }
    }

    public function edit(Complain $complain)
    {
        return view('complains.edit', ['complain' => $complain]);
    }

    public function update(Complain $complain, Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required',
            'customer_age' => 'required',
            'customer_address' => 'required',
            'problem_description' => 'required',
            'date' => 'required',
        ]);

        try {
            $complain->update($request->all());
            return redirect()->route('complains.index')->with('success', 'Complain updated !');
        } catch (\Exception $e) {
            return redirect()->route('complains.index')->with('error', 'Error updating complain,try again !');
        }
    }

    public function destroy(Complain $complain)
    {
        try {
            $complain->delete();
            return redirect()->route('complains.index')->with('success', 'Complain deleted !');
        } catch (\Exception $e) {
            return redirect()->route('complains.index')->with('error', 'Error deleting complain,try again !');
        }
    }
}
