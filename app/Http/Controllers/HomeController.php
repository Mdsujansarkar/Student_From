<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\From;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('from.from');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'name'        => 'required|string',
        'description' => 'required|string',
        'image'       => 'required',
      ]);

      $input = $request->all();
      if ($request->hasFile('image')) {

         $image = $request->file('image');
         $destinationPath = 'from/one/';
         $imageChange = date('YmdHis') . "-" . $image->getClientOriginalName();
         $image-> move($destinationPath, $imageChange);
         $input['image'] = "$imageChange";
      }
      $from = From::create($input);
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $froms = From::select('id','name','description','image')->paginate(10);
        return view('from.table', ['froms' => $froms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $from = From::findOrfail($id);
        return view('from.edit',[
            'from' =>$from,
        ]);
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
        $from = From::findOrFail($id);
        $request->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
          ]);
          $input = $request->all();
          if($request->hasFile('image'))
          {
              $image = $request->file('image');
              $direactory = 'from/one/';
              $imageName = date('Ymd')."-".$image->getClientOriginalName();
              $image->move($direactory,$imageName);
              $input['image'] = "$imageName";
          } else{
              unset($input['image']);
          }
          $from->update($input);
          return redirect('/table/one');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $from = From::findOrFail($id);
        $from->delete();
        return redirect('/table/one');

    }
}
