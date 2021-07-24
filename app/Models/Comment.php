<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'score', 'customer_id', 'room_id'];

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function UserName(int $comment)
    {
        /*$comment=Comment::find($commentid)->get()->only('customer_id');
        //dd($comment);
        $user=User::find(1)->comment;
        //dd($user);*/

        $user = User::where('id', $comment)->first();

        return $user->name;
    }
    public function RoomName(int $comment)
    {
        /*$comment=Comment::find($commentid)->get()->only('customer_id');
        //dd($comment);
        $user=User::find(1)->comment;
        //dd($user);*/

        $room = Room::where('id', $comment)->first();

        return $room->name;
    }
}
