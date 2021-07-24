<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = new Room([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'address' => $request->get('address'),
            'price' => $request->get('price'),
            'provider_id' => auth()->user()->id,
            //'image' => $request->get('image'),
        ]);
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move('images', $filename);
        $room->image = "/images" . "/" . $filename;

        /*$fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->image('image')->storeAs('images', $fileName, 'public');
        $room->image = '/storage/' . $filePath;*/
        /*$fileName = time().'.'.$request->image->extension(); 
        $request->image->move(public_path('images'), $fileName);
        $room->image = '/storage/' . $filePath;*/
        //$room->image = $request->file('file')->storeAs('images', $room->image, 'public');
        /*$user()->rooms()->create(['name' => $request->get('name'),
        'description' => $request->get('description'),]);*/

        $room->save();

        //$room->save();


        /*$room=Room::create(['name'=>$request->get('name'),'description'=>$request->get('description')]);

        $room->provider_id=auth()->user()->id;*/

        //$room->update();

        //$room->user()->associate(auth()->user());

        //$room->update();

        return redirect(route('rooms'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.roomEdit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        if (empty($request->get('name'))) {
            $room->name = $room->name;
        } else {
            $room->name = $request->get('name');
        }
        if (empty($request->get('description'))) {
            $room->description = $room->description;
        } else {
            $room->description = $request->get('description');
        }
        if (empty($request->get('address'))) {
            $room->address = $room->address;
        } else {
            $room->address = $request->get('address');
        }
        if (empty($request->get('price'))) {
            $room->price = $room->price;
        } else {
            $room->price = $request->get('price');
        }

        if (empty($request->file('image'))) {
            $room->image = $room->image;
        } else {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move('images', $filename);
            $room->image = "/images" . "/" . $filename;


            /*$image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move('images', $filename);
            $room->image = "/images" . "/" . $filename;*/
        }
        $room->save();
        //$room->update($request->all());
        return redirect(route('rooms'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect(route('rooms'));
    }




    public function rooms()
    {
        if (auth()->user()->role == "customer") {
            $rooms = Room::orderBy('id', 'DESC')->whereNull("customer_id")->orwhere("customer_id", auth()->user()->id)->get();
            return view('rooms.rooms', compact('rooms'));
        } else {
            $rooms = Room::orderBy('id', 'DESC')->get();
            return view('rooms.rooms', compact('rooms'));
        }
    }

    public function room(Room $room)
    {
        $comments = Comment::where('room_id', $room->id)->get();
        //dd($room->image);
        return view('rooms.room', compact('room', 'comments'));
    }

    public function roomRegister()
    {
        return view('rooms.roomRegister');
    }
    public function roomReserve(Room $room)
    {
        $room->customer_id = auth()->user()->id;
        $room->update();
        return redirect(route('rooms'));
        //return redirect(route('rooms'));
    }
    public function roomCancel(Room $room)
    {
        $room->customer_id = null;
        $room->update();

        return redirect(route('rooms'));
    }
    public function roomsSearch(Request $request)
    {
        if (empty($request->get('search'))) {
            return redirect(route('rooms'));
        } else {
            $rooms = Room::where('address', 'LIKE', '%' . $request->get('search') . '%')
                //->orwhere('customer_id', '<>', auth()->user()->id)->get();
                ->where(function ($query) {
                    $query->whereNull('customer_id')
                        ->orWhere('customer_id', auth()->user()->id);
                })->get();
            $title = 'جست و جو';
            return view('rooms.roomsSearch', compact('rooms', 'title'));
        }
    }
    public function roomReserved()
    {
        $title = 'رزرو ها';
        $rooms = Room::where('customer_id', auth()->user()->id)->get();
        return view('rooms.roomsSearch', compact('rooms', 'title'));
    }
    public function myRooms()
    {
        $title = 'اتاق های من';
        $rooms = Room::where('provider_id', auth()->user()->id)->get();
        return view('rooms.roomsSearch', compact('rooms', 'title'));
    }
}
