<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class FormController extends Controller
{
    public function index()
    {
        return view('form') ;
    }



    public function confirm(ContactRequest $request)
    {
        $inputs=$request->all();
        
        return view('confirm',['inputs'=>$inputs]);
    }


    public function store(Request $request)
    {
        //修正を押された場合の処理
        if ($request->has("back")) {
            return redirect("/")->withInput();
        }    
        //送信を押された場合の処理
        $contact = new Contact;
        $form=$request->all();
        $form['fullname']="$request->last_name"."$request->first_name";
        unset($form['_token'],$form['last_name'],$form['first_name']);
        $contact->fill($form)->save();
        
        return view('thanks');
    }

    public function admin(Request $request)
    {
        $contacts=Contact::Paginate(10);
        return view('admin',['contacts'=>$contacts]);
    }


    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact -> delete();
        return back();
    }

    public function search(Request $request)
    {
        $fullname = $request['fullname'];
        $gender = $request['gender'];
        $email = $request['email'];
        $from = $request['created_at_from'];
        $to = $request['created_at_to'];
        $contacts = Contact::doSearch($fullname, $gender, $email, $from ,$to);
        return view('admin', ['contacts' => $contacts]);
    }
}