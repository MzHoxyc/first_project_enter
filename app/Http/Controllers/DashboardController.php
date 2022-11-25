<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Guests;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getAllEvents()
    {
        $events = Event::all();
        return view ('allEvents',compact(['events']));
        // return printf(Event::all());
    }
    public function create(){
        return view ('createEvent');
    }
    public function save_event(Request $request){
        // dd($request->input());
        Event::create([
            'name' => $request->nama_acara,
            'address' => $request->alamat_acara,
            'date' => $request->tanggal_acara
        ]);
        // return $this->getAllEvents();
        return redirect('/all_events')->with('success','Acara Sudah Ditambahkan!');
    }
    public function update($id){
        // $id  = 1 ;
        $edit = Event::find($id);
    
        return view ('createEvent', compact(['edit']));
    }
    public function save_update(Request $request, $id){
        $event = Event::find($id);
        // dd($request->all());
        $event->name = $request->nama_acara;
        $event->address = $request->alamat_acara;
        $event->date = $request->tanggal_acara;

        $event->save();

        return redirect('/all_events')->with('success','Acara Sudah diupdate!');

    }

    public function getAllGuests()
    {
        $guests = Guests::all();
        return view ('allguests',compact(['guests']));
    }
    public function create_guest()
    {
        $events = Event::all();
        return view ('createGuest',compact(['events']));
    }
    public function store_guest(Request $request){
        Guests::create([
            'name' => $request->nama_tamu,
            'address' => $request->alamat_tamu,
            'signature' => $request->ttd,
            'event_id' => $request->event,
        ]);
        // return $this->getAllEvents();
        return redirect('/all_guests')->with('success','Tamu ditambahkan!');
    }

    public function edit_guest($id){
        $edit = Guests::find($id);
        $events = Event::all();

        return view ('createGuest', compact(['edit','events']));
        
    }
    public function update_guest(Request $request,$id){
        $guest = Guests::find($id);
        // dd($request->all());
        $guest->name = $request->nama_tamu;
        $guest->address = $request->alamat_tamu;
        $guest->signature = $request->ttd;
        $guest->event_id = $request->event;

        $guest->save();

        return redirect('/all_guests')->with('success','Acara Sudah diupdate!');
    }

}
