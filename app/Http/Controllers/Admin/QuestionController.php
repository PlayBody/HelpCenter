<?php


namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

use App\Models\Category;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function show(Request $request)
    {
        $categories = Category::all();

        $category_id = $request->input('category_id');
        $search = $request->input('search');
        $search = empty($search) ? '' : $search;

        if (empty($category_id)){
            $category_id = $categories->first()->id;
        }

        $questions = Question::where('category_id', $category_id)
            ->whereRaw("(title like '%".$search. "%' OR description like '%".$search. "%')")
            ->orderBy('updated_at', 'desc')->get();

        return view('admin.questions.index', [
            'questions'=>$questions,
            'categories'=>$categories,
            'category_id' => $category_id,
            'search' => $search
        ]);
    }

    public function edit(Request $request, $edit_id=null)
    {

        $categories = Category::all();

        if (empty($edit_id)){
            $question = new Question;
        }else{
            $question = Question::find($edit_id);

        }

        if(!empty($request->old('category_id'))) $question->category_id = $request->old('category_id');
        if(!empty($request->old('title'))) $question->title = $request->old('title');
        if(!empty($request->old('description'))) $question->description = $request->old('description');
        return view('admin.questions.edit', [
                'categories'=>$categories,
                'question' => $question
            ]);
    }

    public function save(Request $request)
    {

        $action = $request->input('action');
        if ($action == 'save'){
            $validatedData = $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'description' => 'required|min:5',
            ], [
                'title.required' => 'Title is required.',
                'category_id.required' => 'Category is required.',
                'description.required' => 'Description field is required.',
            ]);

            $id = $request->input('id');
            if (empty($id)){
                Question::create($validatedData);
            }else{
                $question = Question::find($id);
                $question->title = $request->input('title');
                $question->description = $request->input('description');
                $question->save();
            }

            return redirect('/admin/questions');
        }
        return view('admin.questions.edit');
    }

    public function delete($del_id=null)
    {

        if (!empty($del_id)){
            Question::where('id', $del_id)->delete();
        }

        return redirect('/admin/questions');
    }


}
