<?php

namespace App\Services;

use App\Enums\RegistrationState;
use App\Models\ChatSession;

class RegistrationStateMachine
{
    public function next(ChatSession $session, string $userInput): void
    {
        switch ($session->current_state) {
            case RegistrationState::START->value:
                $session->current_state = RegistrationState::ASK_NAME->value;
                break;

            case RegistrationState::ASK_NAME->value:
                $session->data = array_merge($session->data ?? [], ['name' => $userInput]);
                $session->current_state = RegistrationState::ASK_EMAIL->value;
                break;

            case RegistrationState::ASK_EMAIL->value:
                $session->data = array_merge($session->data ?? [], ['email' => $userInput]);
                $session->current_state = RegistrationState::ASK_CITY->value;
                break;

            case RegistrationState::ASK_CITY->value:
                $session->data = array_merge($session->data ?? [], ['city' => $userInput]);
                $session->current_state = RegistrationState::CONFIRMATION->value;
                break;

            case RegistrationState::CONFIRMATION->value:
                if (strtolower($userInput) === 'yes') {
                    $session->current_state = RegistrationState::COMPLETED->value;
                } else {
                    $session->current_state = RegistrationState::ASK_NAME->value; // ulang
                }
                break;
        }

        $session->save();
    }
}