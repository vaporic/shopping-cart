<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagePath' => 'http://www.thealmightyguru.com/Reviews/HarryPotter/Images/Cover-GobletOfFire.jpg',
        	'title' => 'Harry Potter',
        	'description' => 'Super cool - at least as a child.',
        	'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://twimgs.com/ddj/galleries/24/03_full.jpg',
        	'title' => 'Javascript',
        	'description' => 'Super cool - at least as a child.',
        	'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://cdn.tripwiremagazine.com/wp-content/uploads/2010/03/JavaScript-jQuery-David-Sawyer-McFarland.jpg',
        	'title' => 'Javascript',
        	'description' => 'Super cool - at least as a child.',
        	'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://mondaybynoon.com/images/books/pro-javascript-techniques.gif',
        	'title' => 'Javascript',
        	'description' => 'Super cool - at least as a child.',
        	'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSG63V1bZaBJO_55QGyN5wHbLaqSM_T9ew3G1ryfl72K5cVaQcOAQ',
        	'title' => 'Javascript',
        	'description' => 'Super cool - at least as a child.',
        	'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://s-media-cache-ak0.pinimg.com/736x/64/6b/d2/646bd23d03e6a5efbd6eb0b7aa358c72.jpg',
        	'title' => 'Javascript',
        	'description' => 'Super cool - at least as a child.',
        	'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://cdn.tutsplus.com/net/uploads/legacy/969_cssMastery/phpab.jpg',
        	'title' => 'PHP',
        	'description' => 'Super cool - at least as a child.',
        	'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://s-media-cache-ak0.pinimg.com/236x/39/21/3c/39213cf83d5aacc17b9ae46d20935597.jpg',
        	'title' => 'Laravel',
        	'description' => 'Super cool - at least as a child.',
        	'price' => 10
        ]);
        $product->save();
    }
}
