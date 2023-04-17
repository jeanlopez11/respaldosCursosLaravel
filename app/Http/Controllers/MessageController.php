<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSent;
use PhpParser\Node\Expr\FuncCall;

class MessageController extends Controller
{
    public function show(Message $message)
    {
        return view('messages.show', [
            'message' => $message,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'to_user_id' => 'required|exists:users,id',
            'subject' => 'required',
            'body' => 'required',
        ]);
        $message = Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        $user = User::find($request->to_user_id);
        $user->notify(new MessageSent($message));

        #redireccionar al post accion notificacions
        return redirect()->action([PostController::class, 'notificaciones'])
        ->with('status', 'Message sent successfully');
    }
}
