<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use Auth;

class DocumentController extends Controller
{
   public function index(){

       $user_id = Auth::user()->id;

       $documents = Document::where('user_id', $user_id)->get();
       return view('document.index', compact('documents'));
   }

   public function create(){
    return view('document.create');
   }

   public function store(Request $request){

        $this->validate($request,[
            'document_title' => 'required',
            'category_name' => 'required',
            'document_description' => 'required'
        ]);
    
      try {
        $documents = new Document;
        $documents->user_id = Auth::user()->id;
        $documents->document_title = $request->document_title;
        $documents->category_name = $request->category_name;
        $documents->document_description = $request->document_description;
        if ($documents->save()) {
           return back()->with('success', 'Document successfully saved.');
        }else{
            return back()->with('error', 'Something Error Found, Please try again.');
        }

      } catch (\Throwable $th) {
          //throw $th;
      }
   }

   public function edit($id){
    $document = Document::findOrFail($id);
    // dd($document);
    return view('document.edit', compact('document'));
    }

    public function update(Request $request,$id){
        
        $this->validate($request,[
            'document_title' => 'required',
            'category_name' => 'required',
            'document_description' => 'required'
        ]);

    try {

        $documents  = Document::findOrFail($id);
        $documents->user_id = Auth::user()->id;
        $documents->document_title = $request->document_title;
        $documents->category_name = $request->category_name;
        $documents->document_description = $request->document_description;

        if ($documents->save()) {
            return back()->with('success','Document successfully updated.');
        }
        else{
            return back()->with('error','Something Error Found !, Please try again.');
        }
    } catch (\Throwable $th) {
        //throw $th;
        dd($th);
    }

    }

    public function destroy($id){
        $document = Document::findOrFail($id);
        if($document){
            $document->delete();
            return redirect()->back()->with('success','Document successfully deleted.');
        }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.');
        }
    }
}
