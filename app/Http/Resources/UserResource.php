<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
          'name'=>$this->name,
          'email'=>$this->email,
          'userName'=>$this->userName,
          'createdAt'=>$this->created_at,
          'api_token'=>$this->api_token
        ];
    }
}
