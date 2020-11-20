<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class QuestionController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function start()
    {
        return view('start');
    }

    public function addQuestion(Request $request)
    {
        $validate = $request->validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'opd' => 'required',
            'ope' => 'required',
            'answer' => 'required',
        ]);

        $ques = new Question();
        $ques->question = $request->question;
        $ques->a = $request->opa;
        $ques->b = $request->opb;
        $ques->c = $request->opc;
        $ques->d = $request->opd;
        $ques->e = $request->ope;
        $ques->answer = $request->answer;

        $ques->save();

        return redirect('questions')->with('success', 'Question has added successfuly!');
    }

    public function show()
    {
        $ques = Question::all();

        return view('questions')->with(['questions' => $ques]);
    }

    public function updateQuestion(Request $request)
    {
        $request->validate($this->getRules());

        $ques = Question::findOrFail($request->id);
        
        $ques->update($request->all());

        return redirect('questions')->with('success', 'Question has updated successfuly!');
    }

    private function getRules()
    {
        return [
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'opd' => 'required',
            'ope' => 'required',
            'answer' => 'required',
            'id' => 'required',
        ];
    }

    public function deleteQuestion(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Question::where('id', $request->id)->delete();

        return redirect('questions')->with('success', 'Question has deleted successfuly!');
    }

    public function ansPage()
    {
        Session::put("nextq", '1');
        Session::put("wrongans", '0');
        Session::put("correctans", '0');

        $ques = Question::all()->first();

        return view('answerPage')->with(['question' => $ques]);
    }

    public function submitAns(Request $request)
    {
        $nextq = Session::get('nextq');
        $wrongans = Session::get('wrongans');
        $correctans = Session::get('correctans');
        
        // $validate = $request->validate([
        //     'ans' => 'required',
        //     'dbans' => 'required',
        // ]);
        // dd("ok");
            
        $nextq +=1;

        if($request->dbans == $request->answer) {
            $correctans +=1;
        } else {
            $wrongans +=1;
        }

        Session::put("nextq", $nextq);
        Session::put("wrongans", $wrongans);
        Session::put("correctans", $correctans);

        $i = 0;
        $questions = Question::all();
        foreach ($questions as $question) {
            
            $i++;
            
            if ($questions->count() < $nextq) {
                return view('end');
            }

            if ($i == $nextq) {
                return view('answerPage')->with(['question' => $question]);
            }
        }
    }
}
