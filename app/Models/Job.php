<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Define the correct table name
    protected $table = "job_listing";

    // Specify the fillable fields
    //protected $fillable = ['employer_id','title', 'salary'];

    protected $guarded=[];

    // Define the relationship to Employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // Define the many-to-many relationship with Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);  

        
    }
}
