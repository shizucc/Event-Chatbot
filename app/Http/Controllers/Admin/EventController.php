<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.events.index');
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function edit($event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function show($event)
    {
        $event = Event::findOrFail($event);
        return view('admin.events.show', compact('event'));
    }

    public function scanner($event)
    {
        $event = Event::findOrFail($event);
        return view('admin.events.tabs.scanner', compact('event'));
    }

    public function registrationFlow($event)
    {
        $event = Event::findOrFail($event);
        return view('admin.events.tabs.registration-flow', compact('event'));
    }
} 