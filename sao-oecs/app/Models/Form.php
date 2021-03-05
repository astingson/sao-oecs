<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_title',
        'venue',
        'target_date',
        'start_date',
        'end_date',
        'org_id',
        'coorganization',
        'org_id',
        'organizer_name',
        'organizer_contact',
        'organizer_email',
        'coorganizer_name',
        'coorganizer_contact',
        'coorganizer_email',
        'activity_classification',
        'activity_classification2',
        'description',
        'rationale',
        'outcome',
        'primary_beneficiary',
        'num_primary_beneficiary',
        'secondary_beneficiary',
        'num_secondary_beneficiary',
        'activities',
        'date_needed',
        'requi_type',
        'total_cost',
        'item_details',
        'remarks',
        'charged',
        'comments',
        'status',
        'has_rf'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function org()
    {
        return $this->belongsTo(Org::class);
    }
}
