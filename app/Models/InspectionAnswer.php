<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_form_id',
        'question_id',
        'option_id',
        'custom_answer',
    ];

    /**
     * Get the inspection form associated with the answer.
     */
    public function form()
    {
        return $this->belongsTo(InspectionForm::class, 'inspection_form_id');
    }

    /**
     * Get the question associated with the answer.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the option associated with the answer.
     */
    public function option()
    {
        return $this->belongsTo(QuestionOption::class, 'option_id');
    }
}
