<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Todo;
use App\VatRate;

class TodoController extends Controller
{
    public function todoShow(Request $request, $id){
        $todo = Todo::findOrFail($id);
        return response()->json($todo);
    }

    public function todoAll(Request $request, $id)
    {
        $todo = Todo::where('status', '=', $id)->get();
        
        return response()->json($todo);
    }

    public function todoAdd(Request $request){
        
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'active' => 'required|boolean',
        ]);
        
        $todo = new Todo;
        $todo->fill($request->input());
        $todo->created_at = strtotime(now());
        $todo->updated_at = strtotime(now());
        $todo->save();

        return response()->json($todo);
    }

    public function todoUpdate(Request $request, $id){
        $request->validate([
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean',
        ]);
        
        $todo = Todo::findOrFail($id);
        $todo->fill($request->input());
        $todo->updated_at = strtotime(now());
        $todo->save();

        return response()->json($todo);
    }

    public function todoRemove(Request $request, $id){
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return response()->json([
            'message' => 'Success!'
        ], 200);
    }
}