<?php

namespace App\Models;

use Database\Factories\TestFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['name', 'comment'];

    /**
     * モデルの新ファクトリ・インスタンスの生成
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TestFactory::new();
    }
}
