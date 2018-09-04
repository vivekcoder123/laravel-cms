<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos=Photo::paginate(4);
        return view('admin.media.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request->file('file');
        $name=time().$file->getClientOriginalName();
        $file->move('images',$name);
        $photo=Photo::create(['file'=>$name]);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo=Photo::findorFail($id);
        unlink(public_path().$photo->file);
        $photo->delete();
        Session::Flash('deleted_media','One photo has been deleted');
    }

    public function deleteMedia(Request $request){

         if(isset($request->delete_single) && empty($request->checkBoxArray)){

            $this->destroy($request->delete_single);
            return redirect()->back();

         }

        elseif(isset($request->delete_all) && !empty($request->checkBoxArray)){

           $photos=Photo::findorFail($request->checkBoxArray);
               foreach ($photos as $photo) {
                 unlink(public_path().$photo->file);
                 $photo->delete();
                 Session::Flash('deleted_media','One photo has been deleted');
               }
             return redirect()->back();

         }
         else{
          return redirect()->back();
         }

    }
}
