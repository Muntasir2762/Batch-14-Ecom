<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function showContactMessages ()
    {
        $messages = ContactMessage::get();
        return view ('backend.message.contact', compact('messages'));
    }

    public function deleteContactMessages ($id)
    {
        $message = ContactMessage::find($id);
        $message->delete();

        toastr()->success("Deleted Successfully!");
        return redirect()->back();
    }
}
