<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionOption extends Model
{
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    public function polls(): HasMany
    {
        return $this->hasMany(UserPoll::class, 'question_option_id');
    }
}
