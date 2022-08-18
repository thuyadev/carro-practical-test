<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactUser extends Model
{
    use HasFactory;

    protected $table = 'contact_users';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'date_of_birth',
        'description',
        'contact_form_id',
    ];

    public function contactForm(): BelongsTo
    {
        return $this->belongsTo(ContactForm::class, 'contact_form_id');
    }


}
