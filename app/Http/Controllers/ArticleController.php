<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ArticleCollection;

class ArticleController extends Controller
{
     public function __construct()
    {

    }

    public function index(Request $request)
    {
        $title = $request->title;
      if(!empty($title)){
          $articles =  Article::with(['user','categories'])
           ->where('title','LIKE','%' . $title . '%')
           ->orderBy('id','DESC')
           ->paginate(10);
      }else{
          $articles  =  Article::with(['user','categories'])
          ->orderBy('id','DESC')
          ->paginate(10);
      }
        return $articles;
    }

   

    public function store(Request $request)
    {
  
        $this->validate(request() , [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required'
          
        ]);
 
        $data =request(['title' , 'body']);
        $data['slug'] = str_replace(' ', '_', $data['title']);

        $article = auth()
                    ->user()
                    ->articles()
                    ->create($data);

        $article->categories()->attach(explode(',',request('category')));
     
           $file = request()->file('file'); 
           $name = time() .'.'. $file->getClientOriginalExtension() ;
           $file->move(public_path('/upload/article'),$name);
           $article->image = $name;
           $article->save();

        return response()->json(['status'=>'success','message'=>'article send successfully!']);
    }

    public function show($id)
    {
        return Article::with(['comments.user','user','categories'])
              ->where(['id'=>$id])->first();
        
    }

  public function edit($id){
    return Article::with(['categories'])
              ->find($id);
  }

    public function update(Request $request ,$id)
    {
 
        $article =  Article::findOrFail( $id);
        if(Gate::allows('update_article',$article)){
        $data = $request->only(['title','body']);
        $data['slug'] = 'df';
       
        $article->update($data);
        $article->categories()->sync(explode(',',$request->category));
        if($request->hasFile('file'))
         {
            $file = $request->file('file'); 
            $name ='1.jpg'; //time() .'.'. $file->getClientOriginalExtension() ;
            $file->move(public_path('/upload/article'),$name);
            $article->image = $name;
            $article->save();
         }

         return response()->json(['status'=>'success','message'=>'article Update successfully!']);
        }

        return [
         'status'=>'failed',
         'message'=>'the user unauthrization article'
        ];
    }

     public function destroy($id)
    {
         Article::findOrFail($id)->delete();
         return response('با موفقیت حذف شد');
    } 
 
     


}
