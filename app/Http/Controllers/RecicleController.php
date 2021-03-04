<?php

namespace App\Http\Controllers;

use App\Models\Recicle;
use Illuminate\Http\Request;

class RecicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Recicle::latest()->paginate(5);
    
        return view('recicle.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'descricao' => 'required',
            'tipo_reciclagem' => 'required',
        ]);
    
        Recicle::create($request->all());
     
        return redirect()->route('recicle.index')
                        ->with('success','Cadastro criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recicle  $recicle
     * @return \Illuminate\Http\Response
     */
    public function show(Recicle $recicle)
    {
        return view('recicle.show',compact('recicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recicle  $recicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Recicle $recicle)
    {
        return view('recicle.edit',compact('recicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recicle  $recicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recicle $recicle)
    {
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'descricao' => 'required',
            'tipo_reciclagem' => 'required',
        ]);
    
        $recicle->update($request->all());
    
        return redirect()->route('recicle.index')
                        ->with('success','Cadastro atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recicle  $recicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recicle $recicle)
    {
        $recicle->delete();
    
        return redirect()->route('recicle.index')
                        ->with('success','Cadastro deletado com sucesso');

    }
}
