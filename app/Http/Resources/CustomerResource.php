<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'dni' => $this->dni,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'description' => $this->description,
        ];
    }
}
