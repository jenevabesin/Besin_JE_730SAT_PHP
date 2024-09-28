<?php 

namespace App\Models;

use Illuminate\Support\Arr;

class Job {
    // This method returns all jobs
    public static function all(): array {
        return [
            [
                'id'=> 1,
                'title' => 'Teacher',
                'salary' => '$10000'
            ],
            [
                'id'=> 2,
                'title' => 'Programmer',
                'salary' => '$60000'
            ],
            [
                'id'=> 3,
                'title' => 'QA',
                'salary' => '$40000'
            ]
        ];
    }
// This method finds a job by ID
public static function find(int $id): array 
{
    $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
    
    if (! $job) {
        abort(404); // Handle not found case
    }
    
    return $job; // Return the found job
}
}
