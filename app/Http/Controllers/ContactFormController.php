<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // クエリビルダー
use App\Models\ContactForm;
use App\Services\CheckFormData;
use App\Http\Requests\StoreContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
      // Eroquent ORmapper
      // $contacts = ContactForm::all();

      // QueryBuilder
      // $contacts = DB::table('contact_forms')
      //   ->select('id', 'your_name', 'updated_at')
      //   ->orderBy('updated_at', 'desc')
      //   ->paginate(20); // 20件しか取得されていない
      // ->get();

      $search = $req->input('search'); // クエリパラメータ取得
      $query = DB::table('contact_forms')->select('id', 'your_name', 'updated_at');
      if ($search != null) {
        // クエリパラメータが存在する場合
        $search = mb_convert_kana($search, 's'); // クエリパラメータに存在する空白を半角空白に変更
        $keywords = preg_split('/[\s]/', $search, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($keywords as $keyword) {
          $query->where('your_name', 'like', '%' . $keyword . '%');
        }
      }
      $query->orderBy('updated_at', 'desc');
      $contacts = $query->paginate(20);
      $params = array('search' => $search);
      return view('contact.index', compact('contacts', 'params')); // resource/views/contact/index.php
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
    public function store(StoreContactForm $request)
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
      $gender = CheckFormData::decideGender($contact);
      $age = CheckFormData::decideAge($contact);

      return view('contact.show', compact('contact', 'gender', 'age'));
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
