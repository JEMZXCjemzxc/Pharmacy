<?php

// namespace App\Http\Controllers;
// use \App\Models\Event;
// use \App\Models\Category;
// use Illuminate\Http\Request;
// use Illuminate\Validation\ValidationException;

// class EventController extends Controller
// {

    // public function index()
    // {
    //     $events = Event::all();
    //     $categories = Category::all();
    //     return view('myApp.dashboard', compact('events', 'categories'));
    // }

    // public function add_event(Request $request)
    // {
    //     try{
            
    //         $request->validate([
    //         'event_name' => 'required|string|max:255',
    //         'event_description' => 'required|string|max:255'
    //         ]);

    //         Event::create([
    //             'event_name' => $request->event_name,
    //             'event_description' => $request->event_description,
    //         ]);

    //         return redirect()->route('admin.main-dashboard')
    //                         ->with('success', 'Event Successfully Added!');
    //     } catch(\Exception $e) {
    //         return redirect()->route('admin.main-dashboard')
    //         ->with('error', 'Event existed!');
    //     }

    // }



    // public function update_event(Request $request, $id)
    // {
    //     $events = Event::findOrFail($id);

    //     $request->validate([
    //         'event_name' => 'required|string|max:255',
    //         'event_description' => 'required|string|max:255'
    //     ]);

    //     $events->event_name = $request->input('event_name');
    //     $events->event_description = $request->input('event_description');
    //     $events->save();

    //     return redirect()->route('admin.main-dashboard')
    //                         ->with('success', 'Event Updated Successfully!');
       

    // }


    // public function delete_event(Request $request, $id)
    // {
    //     $event = Event::findOrFail($id);

    //     $event->delete();

    //     return redirect()->route('admin.main-dashboard')
    //                         ->with('success', 'Event successfully deleted!');
    // }




// }
