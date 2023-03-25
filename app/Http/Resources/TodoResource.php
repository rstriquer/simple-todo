<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * normalize request inputted parameters
     */
    public static function filterInput(Request $request) : array
    {
        $payload = $request->input();

        if (isset($payload['done'])) {
            $payload['done'] = self::filterDoneField($payload['done']);
        }
        
        return $payload;
    }

    /**
     * Return true or false according to "done" field
     * @see \App\Requests\CreateTodo
     */
    private static function filterDoneField(string $done) : int
    {
        if (in_array($done, ['yes', 'true', '1'])) {
            return true;
        }
        return false;
    }
}
