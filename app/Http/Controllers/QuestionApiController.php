<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Illuminate\Support\Facades\Session;

class QuestionApiController extends Controller
{
    public function view()
    {
        return response()->json(Question::get(), 200);
    }

    public function Create(Request $request)
    {
        $ques = Question::create($request->all());
        return response()->json($ques, 201);
    }
}