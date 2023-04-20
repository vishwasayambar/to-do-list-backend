<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function workspace(): belongsTo
{
    return $this->belongsTo(Workspace::class);
}
}
