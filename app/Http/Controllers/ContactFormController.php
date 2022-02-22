<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // クエリビルダー
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Eroquent ORmapper
      // $contacts = ContactForm::all();

      // QueryBuilder
      $contacts = DB::table('contact_forms')
        ->select('id', 'your_name', 'updated_at')
        ->orderBy('updated_at', 'desc')
        ->get();
      return view('contact.index', compact('contacts')); // resource/views/contact/index.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $contact = new ContactForm();

      $contact->your_name = $request->input('your_name');
      $contact->email = $request->input('email');
      $contact->url = $request->input('url');
      $contact->gender = $request->input('gender');
      $contact->age = $request->input('age');
      $contact->contact = $request->input('contact');

      $contact->save(); // Model に用意されている saveメソッドでテーブルにデータ保存

      return redirect('contact/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $contact = ContactForm::find($id);
      $gender = $this->decideGender($contact);
      $age = $this->decideAge($contact);

      return view('contact.show', compact('contact', 'gender', 'age'));
    }

    /**
     * 性別を判定
     * @param ContactForm $contact
     * @return String 性別
     */
    public function decideGender($contact): String {
      if ($contact->gender === 0) {
        return '男性';
      }
      if ($contact->gender === 1) {
        return '女性';
      }
    }

    /**
     * 年齢を判定
     * @param ContactForm $contact
     * @return String 年齢層
     */
    public function decideAge($contact): String {
      if ($contact->age === 0) {
        return '年齢不明';
      }
      if ($contact->age === 1) {
        return '15~19歳';
      }
      if ($contact->age === 2) {
        return '20~24歳';
      }
      if ($contact->age === 3) {
        return '25~29歳';
      }
      if ($contact->age === 4) {
        return '30~34歳';
      }
      if ($contact->age === 5) {
        return '35~歳';
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $contact = ContactForm::find($id);
      return view('contact.edit', compact('contact'));
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
      $contact = ContactForm::find($id);

      $contact->your_name = $request->input('your_name');
      $contact->email = $request->input('email');
      $contact->url = $request->input('url');
      $contact->gender = $request->input('gender');
      $contact->age = $request->input('age');
      $contact->contact = $request->input('contact');

      $contact->save(); // Model に用意されている saveメソッドでテーブルにデータ保存

      return redirect('contact/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contact = ContactForm::find($id);
      $contact->delete();
      return redirect('contact/index');
    }
}
