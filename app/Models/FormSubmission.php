<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    // Define which attributes are mass assignable
    protected $fillable = ['data'];

    // Mutator to compress the JSON encoded data before saving
    public function setDataAttribute($value)
    {
        $jsonData = json_encode($value); // Encode the array to JSON

        $this->attributes['data'] = is_null($jsonData) ? null : gzcompress($jsonData);
    }

    // Accessor to decompress and decode the JSON data when retrieving
    public function getDataAttribute($value)
    {
        $decompressedData = is_null($value) ? null : gzuncompress($value);
        
        return json_decode($decompressedData, true); // Decode the JSON string to array
    }
}