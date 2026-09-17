<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'class',
        'title',
        'level',
        'achievement_date',
        'image',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'achievement_date' => 'date',
        ];
    }

    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        return $query->when($search, function ($q, $term) {
            $q->where(function ($sub) use ($term) {
                $sub->where('student_name', 'like', "%{$term}%")
                    ->orWhere('class', 'like', "%{$term}%")
                    ->orWhere('title', 'like', "%{$term}%")
                    ->orWhere('description', 'like', "%{$term}%");
            });
        });
    }

    public function scopeLevel(Builder $query, ?string $level): Builder
    {
        return $query->when($level, function ($q, $lvl) {
            $q->where('level', $lvl);
        });
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->image && Storage::disk('public')->exists($this->image)) {
                    return Storage::disk('public')->url($this->image);
                }

                return asset('images/defaults/achievement-default.svg');
            }
        );
    }

    protected function levelBadgeClass(): Attribute
    {
        return Attribute::make(
            get: function () {
                return match ($this->level) {
                    'Internasional' => 'bg-purple-100 text-purple-700 border-purple-200',
                    'Nasional' => 'bg-amber-100 text-amber-800 border-amber-200',
                    'Provinsi' => 'bg-blue-100 text-blue-800 border-blue-200',
                    'Kabupaten/Kota' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                    default => 'bg-slate-100 text-slate-800 border-slate-200',
                };
            }
        );
    }

    protected function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::limit(strip_tags($this->description), 110)
        );
    }
}
