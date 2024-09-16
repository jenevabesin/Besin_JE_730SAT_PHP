<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr; // Import the Arr class


Route::get('/', function () {
  return View('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
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
        ]
      ]);
  });


  Route::get('/jobs/{id}', function ($id) {
$jobs = [
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

        $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});


Route::get('/contact', function () {
    return view('contact');
});

