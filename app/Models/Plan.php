<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\VarLikeIdentifier;

class Plan extends Model
{
    protected $fillable =['name' , 'url', 'price', 'description'];
    
    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();

        return $results;

    }

    use HasFactory;
}
