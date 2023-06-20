<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new UserScope);
    }

    public function scopeSearch($query, $value)
    {
        if (isset($value) && $value != null && $value != "" && strlen($value) > 0) {
            $query->where(function ($query) use ($value) {
                $query->where(DB::raw('lower(tasks.title)'), 'like', '%' . strtolower($value) . '%');
            });
        }
    }

    public function scopeFilters($query, $params)
    {

        $query->select('id', 'title', 'description', DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y %H:%m:%s") as created_date'));

        if (isset($params['search'])) {
            $query->search($params['search']);
        }

        if (isset($params['filter'])) {

            switch ($params['filter']) {
                case 1:
                    $query->orderBy('title', 'asc');
                    break;
                case 2:
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }

        }
    }
}
