<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'faq_tab_id',
        'question',
        'answer',
    ];

    public function faqTab()
    {
        return $this->belongsTo(FaqTab::class);
    }
}
