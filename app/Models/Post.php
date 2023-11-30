<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 *
 * @property int user_id
 * @property string title
 * @property string content
 * @property \DateTime created_at
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function author()
    {
        return $this->hasOne(User::class);
    }

    public function getCreatedDate()
    {
        return $this->created_at->format('d M Y');
    }
}
