<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recusive;
use Illuminate\Support\Str;
// use App\Repositories\CategoryRepository;
use App\Http\Requests\categoryAddRequest;

class CategoryController extends Controller
{   
    private $category;
    
    public function __construct(Category $category){
        $this->category = $category;
    }
    
    public function index(){
        $categories = $this->category->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);

        return $htmlOption;
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId = '');

        return view('admin.category.add' , compact('htmlOption'));    
    }

    public function store(categoryAddRequest $req){
        $this->category->create([
            'name'=> $req->name,
            'parent_id' => $req->parent_id,
            'slug' => str::slug( $req->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function edit( $id ){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update(categoryAddRequest $req,$id){
        $this->category->find($id)->update([
            'name'=> $req->name,
            'parent_id' => $req->parent_id,
            'slug' => str::slug( $req->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id) {
        try {
            $this->category->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

}
