<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function show()
    {
        $categories = Category::orderBy('order_num', 'asc')->get();

        return view('admin.categories.index', [
            'categories'=>$categories
        ]);
    }

    public function edit(Request $request, $edit_id=null)
    {

        if (empty($edit_id)){
            $category = new Category;
        }else{
            $category = Category::find($edit_id);

        }

        if(!empty($request->old('title'))) $category->title = $request->old('title');
        if(!empty($request->old('order_num'))) $category->sub_title = $request->old('order_num');
        if(!empty($request->old('icon_url'))) $category->icon_url = $request->old('icon_url');
        return view('admin.categories.edit', [
                'category' => $category
            ]);
    }

    public function save(Request $request)
    {

        $action = $request->input('action');
        if ($action == 'save'){
            $validatedData = $request->validate([
                'title' => 'required',
                'order_num' => 'required|numeric|min:1',
                'icon_url' => '',
            ], [
                'title.required' => 'Title is required.',
                'order_num.required' => 'Title is required.',
            ]);

            $id = $request->input('id');
            if (empty($id)){
                Category::create($validatedData);
            }else{
                $category = Category::find($id);
                $category->title = $request->input('title');
                $category->order_num = $request->input('order_num');
                $category->icon_url = $request->input('icon_url');
                $category->save();
            }

            return redirect('/admin/categories');
        }
        return view('admin.categories.edit');
    }

    public function delete($del_id=null)
    {

        if (!empty($del_id)){
            Category::where('id', $del_id)->delete();
        }

        return redirect('/admin/categories');
    }

    public function iconupload(Request $request){
        if($request->hasFile('icon')){
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHis').uniqid('_').'.'.$extension;

            $file->move(public_path('/uploadedimages'), $filename);
            echo(json_encode(['result'=>true, 'file_name'=>$filename]));
        }else{
            echo(json_encode(['result'=>false]));
        }


    }

}
