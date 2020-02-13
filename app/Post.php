<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Post extends Model
{
    use NodeTrait;

    protected $fillable = [
	    'type',
	    'content',
	    'popularity'
    ];

    protected $appends = ['children']; // Appends children as an attribute when data is serialized (e.g. in JSON form)

    public function getChildrenAttribute()
	{
	    return $this->hasMany(Post::class,'parent_id')->orderByDesc('popularity')->get();
	}

    // Obtain all children by doing recursive query using "with('allChildren')"
	public function allChildren()
	{
	    return $this->children()->with('allChildren');
	}

}
