<?php

namespace App\Http\Controllers;
use App\Models as Models;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Base extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function output($a){
        echo "<pre>" . print_r($a, true) . "</pre>";
    }

    public function index(){
        $adventure = Models\Adventure::first()->toArray(); //since demo has only ONE adventure record
        $questions = Models\Question::all()->toArray();
        $choices = Models\Choice::all()->toArray();

        $formatted_questions = [];
        $formatted_choices = [];

        foreach($questions as $k=>$v){
            $formatted_questions[$v['id']] = $v;
        }//index is question id

        foreach($questions as $k=>$v){
            foreach($choices as $kk=>$c){
                if($c['question_id'] == $v['id']){
                    $formatted_choices[$v['id']][$c['id']] = $c;
                }
            }
        }//choices organized by question


        return view('index', [
            'adventure' => $adventure,
            'questions' => $formatted_questions,
            'choices' => $formatted_choices
            ]);
    }

    public function story(Request $request){
        $results = [];

        $data = $request->all(); //retrieves POST data

        $adventure =  $adventure = Models\Adventure::find($data['adventure_id'])
        ->toArray();

        foreach($data['questions'] as $question=>$choice){
            $new_story = new Models\Story;
            $new_story->adventure_id = $data['adventure_id'];
            $new_story->question_id = $question;
            $new_story->choice_id = $choice;
            $new_story->save();
        }//save each select as a story record

        $stories = Models\Story::select('choice_id')
        ->where('adventure_id', $data['adventure_id'])
        ->get()->toArray();//select the stories we just created

        $choices = Models\Choice::whereIn('id', $stories)
        ->get()->toArray();//select the choices that were made

        foreach($choices as $key=>$c){
            $results[$c['question_id']] = $c['description'];
        }//format for printing

        return view('story', [
            'adventure' => $adventure,
            'story' => $results
            ]);
    }

}
