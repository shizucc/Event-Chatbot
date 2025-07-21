<?php

namespace App\Http\Controllers\Chatbot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function handleIncomingMessage(Request $request)
{
    $userPhone = $request->input('from');
    $message = $request->input('body');

    $user = User::firstOrCreate(['phone_number' => $userPhone]);
    $session = ChatSession::firstOrCreate(['user_id' => $user->id], [
        'current_state' => RegistrationState::START->value,
    ]);

    app(RegistrationStateMachine::class)->next($session, $message);

    // balas pesan ke WhatsApp API sesuai state
    $this->sendWhatsAppReply($session);
}

}
