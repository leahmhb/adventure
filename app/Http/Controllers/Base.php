<?php
namespace App\Http\Controllers;
use App\Models as Models;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;

class Base extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function output($a){
        echo "<pre>" . print_r($a, true) . "</pre>";
    }

    public function index(){
        $adventure = Models\Adventure::first()->toArray();

        $questions = Models\Question::all()->toArray();
        $choices = Models\Choice::all()->toArray();
        $formatted_questions = [];
        $formatted_choices = [];

        foreach($questions as $k=>$v){
            $formatted_questions[$v['id']] = $v;
        }

        foreach($questions as $k=>$v){
            foreach($choices as $kk=>$c){
                if($c['question_id'] == $v['id']){
                    $formatted_choices[$v['id']][$c['id']] = $c;
                }
            }
        }

        return view('index', [
            'adventure' => $adventure,
            'questions' => $formatted_questions,
            'choices' => $formatted_choices
            ]);
    }

    public function story(Request $request){
        $results = [];
        $data = $request->all();

        $adventure =  $adventure = Models\Adventure::find($data['adventure_id'])->toArray();

        foreach($data['questions'] as $question=>$choice){
            $new_story = new Models\Story;
            $new_story->adventure_id = $data['adventure_id'];
            $new_story->question_id = $question;
            $new_story->choice_id = $choice;
            $new_story->save();
        }

        $stories = Models\Story::select('choice_id')->where('adventure_id', $data['adventure_id'])->get()->toArray();

        $choices = Models\Choice::whereIn('id', $stories)->get()->toArray();


        foreach($choices as $key=>$c){
            $results[$c['question_id']] = $c['description'];

        }

        return view('story', [
            'adventure' => $adventure,
            'story' => $results
            ]);
    }

}
