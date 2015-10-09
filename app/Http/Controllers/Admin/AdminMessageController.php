<?php namespace App\Http\Controllers\Admin;

use App\Http\Models\Message;
use Request;
use HttpQequest;

class AdminMessageController extends AdminController
{
    public function getIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:message,id'
        ]);

        $message = Message::find(Request::input('id'));

        return response()->json($message);
    }

    public function putIndex(HttpRequest $request) 
    {
        $rules = [
            'id' => 'required|exists:message,id',
            'title' => 'string|max:200',
            'content' => 'string',
            'type' => 'integer',
            'name' => 'string',
            'mobile' => 'integer',
            'email' => 'email',
            'checked' => 'integer'
        ];
        $this->validate($request, $rules);

        $inputs = Request::all();
        $message = Message::find($input['id']);
        foreach(array_keys($rules) as $field) {
            isset($inputs[$field]) && $message->$field = $inputs[$field];
        }
        $message->save();

        return response()->json($message);

    }

    public function deleteIndex(HttpRequest $request)
    {   
        $this->validate($request, [
            'id' => 'required|exists:message,id'
        ]);

        $affectedRows = Message::destroy(Request::input('id'));        

        return response()->json(['affectedRows' => $affectedRows]);
    }
}