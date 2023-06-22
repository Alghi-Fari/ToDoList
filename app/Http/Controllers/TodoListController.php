<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ListItem;
use Illuminate\Support\Facades\Log;

class TodoListController extends Controller
{
    public function saveItem(Request $request){
        $newListItem = new ListItem;
        $newListItem -> name = $request->listitem;
        $newListItem -> is_complete = 0;
        $newListItem -> save();
        
        return redirect('/');
    }

    public function index(){
        return view('welcome', ['listitem' => ListItem::where('is_complete', 0)->get()]);
    }

    public function markComplete($id){
        $listitem = ListItem::find($id);
        $listitem -> is_complete = 1;
        $listitem -> save();

        return redirect('/');
    }
}