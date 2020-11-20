<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function start()
    {
        return view('start');
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
    public function store(AskQuestionRequest $request, Question $question)
    {
        // $this->authorize('create', $question);

        $request->user()->questions()->create($request->only(
            'question', 
            'a',
            'b',
            'c',
            'd',
            'e',
            'answer'
        ));

        return redirect('questions')->with('success', 'Question has added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ques = Question::all();

        return view('questions')->with(['questions' => $ques]);
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
    public function update(Request $request, Question $question)
    {
        // $this->authorize('update', $question);

        $request->validate($this->getRules());

        $ques = Question::findOrFail($request->id);
        
        $ques->update($request->all());

        return redirect('questions')->with('success', 'Question has updated successfuly!');
    }

    private function getRules()
    {
        return [
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'answer' => 'required',
            'id' => 'required',
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Question $question)
    {
        // $this->authorize('delete', $question);

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
