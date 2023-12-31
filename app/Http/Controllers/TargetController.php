<?php

namespace App\Http\Controllers;

use App\Libraries\PlanetextToUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Target;
use DateTime;
use Carbon\Carbon;


class TargetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){

        $target = Target::orderBy('updated_at','desc')->paginate(5);

        return view('target.index', compact('target'));
    }

    public function orderByDay(Request $request){

        $target = Target::orderBy('xday')->paginate(5);

        return view('target.index', compact('target'));
    }


    public function targetClone($id)
    {
       $target = Target::find($id);
       $new_target = $target->replicate();
       $new_target->past = $target->present;
       $new_target->status = '1';
       $new_target->present = '';
       $new_target->pre_url = '';
       $date = Carbon::parse($target->xday);
       $oneYearLater = $date->addYear();
       $new_target->xday = $oneYearLater->toDateString();
       $new_target->save();
       $target->delete();

       return redirect('/target/index')->with('flash_message', ' ↓ 来年のレコードを作成しました ↓ ');
    }

    public function register(Request $request){
        $target = Target::where('user_id','=',$request->user_id)->first();

        //商品登録画面
        return view('/target/register');

    }

    public function targetRegister(Request $request){

       //バリデーション
       $request->validate([
           'image' => 'nullable | max:50 | mimes:jpg,png',
           'name' => 'required | max:100',
           'event' => 'required',
           'xday' => 'required',
           'hobby_other' => 'max:100',
           'fav_food_drink' => 'max:100',
           'fav_thing' => 'max:100',
           'memo' => 'max:500',
           'idea' => 'max:100',
           'url' => 'nullable | url | max:255',
           'idea2' => 'max:100',
           'url2' => 'nullable | url | max:255',
           'idea3' => 'max:100',
           'url3' => 'nullable | url | max:255',
           'status' => 'required',
           'present' => 'max:100',
           'pre_url' => 'nullable | url | max:255',
            ],
       );

        //新しいレコードの追加
        $target = new Target();
        $target->name = $request->name;
        $target->event = $request->event;
        $target->xday = $request->xday;
        $target->budget = $request->budget;
        $target->hobby = $request->hobby;
        $target->hobby2 = $request->hobby2;
        $target->hobby3 = $request->hobby3;
        $target->hobby4 = $request->hobby4;
        $target->hobby5 = $request->hobby5;
        $target->hobby_other = $request->hobby_other;
        $target->fav_color = $request->fav_color;
        $target->fav_food_drink = $request->fav_food_drink;
        $target->fav_thing = $request->fav_thing;
        $target->memo = $request->memo;
        $target->idea = $request->idea;
        $target->url = $request->url;
        $target->idea2 = $request->idea2;
        $target->url2 = $request->url2;
        $target->idea3 = $request->idea3;
        $target->url3= $request->url3;
        $target->status = $request->status;
        $target->present = $request->present;
        $target->pre_url= $request->pre_url;
        $target->user_id = Auth::id();
        //dd($request);

        if($request->file('image')){
            //postされた画像ファイルデータを取得しbase64でエンコードする
            $image = base64_encode(file_get_contents($request->image->getRealPath()));
            //base64エンコードしたバイナリデータを格納
            $target->image = $image;
        }

        $target->save();

        return redirect('/target/index');

    }

    public function information(Request $request){
        $target = Target::where('id','=', $request->id)->first();

        //文字列の中にurlがあったらコンバート
        $url = PlanetextToUrl::convertLink($target->url);
        $url2 = PlanetextToUrl::convertLink($target->url2);
        $url3 = PlanetextToUrl::convertLink($target->url3);
        $pre_url = PlanetextToUrl::convertLink($target->pre_url);
        
        return view('/target/information',compact('target','url','url2','url3','pre_url'));
    }

    public function edit($id){
        //一覧から指定されたIDのレコードを取得する
        $target = Target::where('id','=',$id)->first();

        return view('/target/edit')->with([
            'target' => $target,
        ]);
    }

    public function targetEdit(Request $request){

        //バリデーション
       $request->validate([
           'image' => 'nullable | max:50',
           'name' => 'required | max:100 ',
           'event' => 'required',
           'xday' => 'required',
           'hobby_other' => 'max:100',
           'fav_food_drink' => 'max:100',
           'fav_thing' => 'max:100',
           'memo' => 'max:500',
           'idea' => 'max:100',
           'url' => 'nullable | url | max:255',
           'idea2' => 'max:100',
           'url2' => 'nullable | url | max:255',
           'idea3' => 'max:100',
           'url3' => 'nullable | url | max:255',
           'status' => 'required',
           'present' => 'max:100',
           'pre_url' => 'nullable | url | max:255',
            ],
       );
 
        //既存のレコードを取得して編集してから保存する
        $target = Target::where('id','=',$request->id)->first();

        $target->name = $request->name;
        $target->event = $request->event;
        $target->xday = $request->xday;
        $target->budget = $request->budget;
        $target->hobby = $request->hobby;
        $target->hobby2 = $request->hobby2;
        $target->hobby3 = $request->hobby3;
        $target->hobby4 = $request->hobby4;
        $target->hobby5 = $request->hobby5;
        $target->hobby_other = $request->hobby_other;
        $target->fav_color = $request->fav_color;
        $target->fav_food_drink = $request->fav_food_drink;
        $target->fav_thing = $request->fav_thing;
        $target->memo = $request->memo;
        $target->idea = $request->idea;
        $target->url = $request->url;
        $target->idea2 = $request->idea2;
        $target->url2 = $request->url2;
        $target->idea3 = $request->idea3;
        $target->url3= $request->url3;
        $target->status = $request->status;
        $target->present = $request->present;
        $target->pre_url= $request->pre_url;
        $target->user_id = Auth::id();
        //dd($request);
 
         if($request->file('image')){
             //postされた画像ファイルデータを取得しbase64でエンコードする
             $image = base64_encode(file_get_contents($request->image->getRealPath()));
             //base64エンコードしたバイナリデータを格納
             $target->image = $image;
         }
 
         $target->save();
 
         return redirect('/target/index');
 
     }
    
    public function search(){
        
        return view('/target/search');

    }

//イベント毎の検索
    public function searchEvent1(){
        $target= Target::where('event','1')->paginate(5);
        return view('target.index',compact('target'));
    }

    public function searchEvent2(){
        $target= Target::where('event','2')->paginate(5);
        return view('target.index',compact('target'));
    }

    public function searchEvent3(){
        $target= Target::where('event','3')->paginate(5);
        return view('target.index',compact('target'));
    }

    public function searchEvent4(){
        $target= Target::where('event','4')->paginate(5);
        return view('target.index',compact('target'));
    }

    public function searchEvent5(){
        $target= Target::where('event','5')->paginate(5);
        return view('target.index',compact('target'));
    }

    public function searchEvent6(){
        $target= Target::where('event','6')->paginate(5);
        return view('target.index',compact('target'));
    }

//ステータス毎の検索
    public function searchStatus1(){
        $target= Target::where('status','1')->paginate(5);
        return view('target.index',compact('target'));
    }

    public function searchStatus2(){
        $target= Target::where('status','2')->paginate(5);
        return view('target.index',compact('target'));
    }

    public function searchStatus3(){
        $target= Target::where('status','3')->paginate(5);
        return view('target.index',compact('target'));
    }


//キーワード検索
    public function searchName(Request $request){
        
        //検索フォーム処理
        $keyword = $request->input('keyword');

        $query = Target::query();
        
        if($keyword){
            $query->where('name','LIKE',"%{$keyword}%");
        }
 
        $target = $query->paginate(5);
 
        return view('target.index',compact('target','keyword'));
         
    }
    

    public function targetDelete(Request $request,$id){

        $request->validate([
            'checkDelete' => 'required',
        ]);

        $target = Target::where('id','=',$id)->first();
        $target->delete();

        return redirect('/target/index');

    }

}
