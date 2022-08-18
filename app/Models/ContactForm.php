<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactForm extends Model
{
    use HasFactory;

    protected $table = 'contact_forms';

    protected $fillable = ['name', 'input_values'];

    public function contactUsers(): HasMany
    {
        return $this->hasMany(ContactUser::class, 'contact_form_id');
    }

    public function decodedInputValues(): Attribute
    {
        return Attribute::make(
            fn () => json_decode($this->input_values, true)
        );
    }


}
