<?php

namespace App\Http\Controllers;
use App\Models\DrapDropModel;

use Illuminate\Http\Request;

class DragDropController extends Controller
{
    public function DragAndDrop()
    {
        $posts = DrapDropModel::get();
        return view('draganddrop',compact('posts'));
    }
   
    // this function update all data and orders accordin put or pull to frontend
    public function updateDrag(Request $request)
    {
        $posts = DrapDropModel::all();

        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }



}
