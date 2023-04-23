<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Card extends Model
{
    use HasFactory;
    public const ID = 'id';
    public const   WORKSPACE_ID = 'workspace_id';
    public const HEADING = 'heading';
    public const BODY = 'body';

    protected $fillable = [
       self::HEADING,
       self::BODY,
       self::WORKSPACE_ID,
    ];

    public  static  function search($search, $workspaceId) {
        Log::info('Searching'. $search);
        return self::query()
            ->select('id', 'heading', 'body')
            ->where('workspace_id', $workspaceId)
            ->where(function($query) use($search) {
                $query->orWhere(self::HEADING , 'LIKE', '%'.$search.'%')
                    ->orWhere(self::BODY, 'LIKE', '%'.$search.'%');
            })
            ->get();

    }

    public static  function globalSearch($searchText){
        return self::query()->select(self::HEADING, self::BODY, self::WORKSPACE_ID, self::ID)
            ->where(self::HEADING, 'LIKE', '%'.$searchText.'%')
            ->orWhere(self::BODY, 'LIKE', '%'.$searchText.'%')
            ->orWhere(self::WORKSPACE_ID, 'LIKE', '%'.$searchText.'%')
            ->limit(5)
            ->get();
    }
    public function workspace(): belongsTo
{
    return $this->belongsTo(Workspace::class);
}
}
