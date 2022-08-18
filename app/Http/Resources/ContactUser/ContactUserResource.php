<?php

namespace App\Http\Resources\ContactUser;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this['id'],
            'email' => $this['email'],
            'phone' => $this['phone'],
            'gender' => $this['gender'],
            'date_of_birth' => $this['date_of_birth'],
            'description' => $this['description'],
        ];
    }
}
