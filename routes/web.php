<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('about', function () {
//     return 'About us page';
// });

Route::get('about', function () {
    return view('static/about');
});


// Route::get('contact-us', function () {
//     echo '<h2>Contact us Page</h2>';
// });

Route::get('contact-us', function () {
    return view('static.contacts');
});


Route::get('services', function () {
    ?>
    <h1 class="bg-green-100">Our services</h1>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis, dolore?</p>
    <p>Eaque velit eius tempora dicta sit, architecto veniam. Obcaecati, asperiores!</p>
    <p>Magni quo perferendis quis veniam nesciunt a eos dolores odio?</p>
    <p>Iure vel qui nemo aspernatur ad vitae, omnis earum odio.</p>
    <p>Officiis expedita at sequi voluptas voluptatum veritatis ex iusto adipisci.</p>
    <?php
});


Route::get('employees', function () {
    return 'Employees Page';
});

Route::get('employees/{id}', function ($id) {
    return view('employees', ['id' => $id]);
});


Route::get('reports/{month}/{year}', function ($month, $year) {


    // $name = 'Maged';

    $data = compact('year', 'month');

    // dd($data);


    // return view('monthly-reports', ['month' => $month, 'year' => $year]);
    return view('monthly-reports', $data);
});



Route::get('characters/{id?}', function ($id = 0) {

    if ($id === 0)
        return view('characters.all');

    return view('characters.single', compact('id'));
});

// https://dummyjson.com/
Route::get('users', function () {
    // Communicate with database to get all users' data
});


Route::get('products', function () {
    // Communicate with database to get all products
});


// (((((((((        Not for web routes      )))))))))
// Route::get('products/{id}', function ($id) {
//     // Communicate with database to get single product by id

//     return response()->json([
//         'id' => $id,
//         'name' => 'Pink Shoes for girls',
//         'price' => 1540.66,
//         'photo' => 'https://www.imgs.com/pink/shoes/girl.png',
//         'discount' => 0.1,
//     ]);
// });


