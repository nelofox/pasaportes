<?php

namespace Pasaporte\Http\Controllers;

use Illuminate\Http\Request;
use  Pasaporte\Passport;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passports=Passport::all();  //equivale a como  select * from passports
        //return $passports;
        return view('index',compact('passports'));
        
    }
    public function multiplicacion()
    {
         $a=2;
         $b=3;

        $aux=$a*$b;
        return view('se',compact('aux'));
        
    }

    public function buscarpasaporte()
    {
        
        $pasaporte= Passport::where('id', 6)->first();
        
        return view('mostrarpasaporte',compact('pasaporte'));
        
    }
    public function buscarmayorestelefonos()
    {
        
        $mayoresnumber = Passport::where('number', '>', 77555)->get();
        //return $mayoresnumber;
        return view('mayores',compact('mayoresnumber'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('filename'))
        {
           $file = $request->file('filename');
           $name=time().$file->getClientOriginalName();
           $file->move(public_path().'/images/', $name);
        }
       $passport= new Passport;
       $passport->name=$request->get('name');
       $passport->email=$request->get('email');
       $passport->number=$request->get('number');
       $date=date_create($request->get('date'));
       $format = date_format($date,"Y-m-d");
       $passport->date = strtotime($format);
       $passport->office=$request->get('office');
       $passport->filename=$name;
       $passport->save();
       
       return redirect('passports')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passport = Passport::find($id);
        return view('edit',compact('passport','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $passport=Passport::find($id);
        $passport->name=$request->get('name');
        $passport->email=$request->get('email');
        $passport->number=$request->get('number');
        $passport->office=$request->get('office');
        $passport->save();
        return redirect('passports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $passport = Passport::find($id);
        $passport->delete();
        return redirect('passports')->with('success','Information has been  deleted');
    }
}
