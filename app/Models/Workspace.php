<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    public const ID = 'id';
    public const USER_ID = 'user_id';
    public const WORKSPACE = 'workspace';

    protected $casts = [
        self::ID => 'int', self::WORKSPACE => 'string',
    ];
    protected $fillable = [
        self::WORKSPACE,
        self::USER_ID,
    ];


        public function  card()
        {
            return $this->hasMany(Card::class);
        }

        public static function search($searchText){
            return self::query()->select('workspace', 'id')->where(self::WORKSPACE, 'LIKE',  '%'.$searchText.'%')->limit(5)->get();
        }
}
