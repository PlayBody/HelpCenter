<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('order_num', 'asc')->get();
        $questions = [];
        foreach ($categories as $category){
            $question = Question::where('category_id', $category->id)->orderBy('rank', 'desc')->get();
            if (count($question)>0){
                $questions[] = $question->first();
            }

        }
        return view('home', [
            'questions' => $questions
        ]);
    }

    public function category($category_id)
    {
        $category = Category::find($category_id);
        $navs = array(
            array('label' => 'All Questions', 'url'=>'all'),
            array('label' => $category->title, 'url'=>'category/'.$category_id)
        );
        $header = array('label' => $category->title, 'icon'=>$category->icon_url);

        $questions = Question::where('category_id', $category_id)->orderBy('rank', 'desc')->orderBy('updated_at', 'desc')->get();
        return view('list', [
            'navs' => $navs,
            'header' => $header,
            'questions' => $questions
        ]);
    }

    public function allquery()
    {
        $navs = array(
            array('label' => 'All Questions', 'url'=>'all'),
        );
        $header = array('label' => 'All Questions', 'icon'=>'');

        $questions = Question::orderBy('rank', 'desc')->get();
        return view('list', [
            'navs' => $navs,
            'header' => $header,
            'questions' => $questions
        ]);
    }

    public function searchresults($query)
    {
        //$query = $request->input('query');
        $search = str_replace("'","\'", $query);
        $questions = Question::whereRaw("(title like '%".$search. "%' OR description like '%".$search. "%')")
            ->orderBy('rank', 'desc')->paginate(10);


        return view('searchresults', [
            'query' => $query,
            'questions' => $questions
        ]);
    }
    public function question($question_id)
    {
        $question = Question::find($question_id);
        $navs = array(
            array('label' => 'All Questions', 'url'=>'all'),
            array('label' => $question->category->title, 'url'=>'category/'.$question->category->id)
        );
        $header = array('label' => $question->title, 'icon'=>'');

        return view('question', [
            'navs' => $navs,
            'header' => $header,
            'question' => $question
        ]);
    }

    public function search(Request $request){
        $search = $request->input('search_word');

        $search = str_replace("'","\'", $search);
        //var_dump($search);die();
        $questions = Question::whereRaw("(title like '%".$search. "%' OR description like '%".$search. "%')")
            ->orderBy('rank', 'desc')->get();

        return view('search', [
            'questions' => $questions
        ]);

    }

    public function recommend(Request $request){
        $question_id = $request->input('question_id');
        $count = $request->input('count');
        $question = Question::find($question_id);
        $question->rank = $question->rank + $count;
        $question->save();

        echo json_encode(['result' => true]);

    }
}
