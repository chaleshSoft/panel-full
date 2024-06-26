<?php

namespace App\Repository\Attribute;

use App\Models\AttributeSite\Like;
use Illuminate\Support\Facades\DB;
use function Psy\debug;

class likeRepo
{
    public function index_manager()
    {
        // TODO
    }

    public function index_accessed()
    {
        // TODO
    }

    public function index_you_tuber()
    {
        // TODO
    }

    public function index_user()
    {
        // TODO
    }

    public function store($bookmarkable)
    {
        $check = $this->checkLike($bookmarkable);
        if (!is_null($check) ) {
            if($check->is_state === 0 ){
                $check->update(['is_state' => 1]);
                return true;
            }
            // $check->delete();
            $check->update(['is_state' => false]);
            return false;
        }
        return Like::query()->create([
            'likeable_type' => get_class($bookmarkable),
            'likeable_id' => $bookmarkable->id,
            'is_state' => 1,
            'user_id' => auth()->user()->id
        ]);
    }

    public function checkLike($bookmarkable)
    {
        return Like::query()->where('likeable_type', get_class($bookmarkable))
            ->where('likeable_id', $bookmarkable->id)
            ->where('user_id', auth()->id())
            ->first();
    }

}
