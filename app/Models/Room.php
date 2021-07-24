<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isEmpty;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'address', 'price', 'image', 'customer_id', 'provider_id'];

    public function comments()
    {
        return $this->hasmany('App\Comment');
    }
    public function user()
    {
        if (auth()->user()->role == 'provider')
            return $this->belongsTo(User::class, 'provider_id');
        else
            return $this->belongsTo(User::class, 'customer_id');
    }
    public function AverageScore(int $room)
    {
        $score = Comment::where('room_id', $room)->avg('score');
        if ($score == null)
            $score = "امتیازی داده نشده است.";
        return $score;
    }
    public function CommentChecker(int $room)
    {
        $comment = Comment::where([
            ['room_id', $room],
            ['customer_id', auth()->user()->id]
        ])->get();

        //dd($comment);

        if ($comment->isEmpty())
            return true;
        else
            return false;
    }
}
