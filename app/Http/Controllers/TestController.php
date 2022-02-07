<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Test; // モデルクラスを参照

class TestController extends Controller
{
    public function index() {
      $values = Test::all();
      // dd($values); // 処理を停止して変数の中身をデバックできる
      return view('tests.test', compact('values'));
    }
}
