<?php

namespace App\Http\Controllers;
use Exception;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Str;



use Illuminate\Http\Request;

class TestChatModuleController extends Controller
{

    public function index()
    {
        return view('chat');
    }

    public function chat(Request $request)
    {
        $result = Gemini::geminiPro()->generateContent($request->input('prompt'));
        $result = $result->text();
        $result = Str::markdown($result);
        return response()->json(['result' => $result]);
    }

}
