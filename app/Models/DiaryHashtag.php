<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryHashtag extends Model
{
    use HasFactory;
    protected $table = 'diary_hashtags';

    protected $fillable = [
        'diary_id',
        'hashtag_id',
    ];

    public function diary()
  {
    return $this->belongsTo(DiaryModel::class);
  }

  public function hashtag()
  {
    return $this->belongsTo(Hashtag::class);
  }

}
