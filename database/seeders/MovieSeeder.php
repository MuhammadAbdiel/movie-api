<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'slug' => 'the-avengers',
                'title' => 'The Avengers',
                'publishingYear' => 2012,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-matrix',
                'title' => 'The Matrix',
                'publishingYear' => 1999,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-dark-knight',
                'title' => 'The Dark Knight',
                'publishingYear' => 2008,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'inception',
                'title' => 'Inception',
                'publishingYear' => 2010,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-godfather',
                'title' => 'The Godfather',
                'publishingYear' => 1972,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-godfather-ii',
                'title' => 'The Godfather II',
                'publishingYear' => 1974,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-rings-of-power',
                'title' => 'The Rings of Power',
                'publishingYear' => 2002,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-lord-of-the-rings',
                'title' => 'The Lord of the Rings',
                'publishingYear' => 2001,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-lord-of-the-rings-ii',
                'title' => 'The Lord of the Rings II',
                'publishingYear' => 2002,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-lord-of-the-rings-iii',
                'title' => 'The Lord of the Rings III',
                'publishingYear' => 2003,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-lord-of-the-rings-iv',
                'title' => 'The Lord of the Rings IV',
                'publishingYear' => 2004,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-lord-of-the-rings-v',
                'title' => 'The Lord of the Rings V',
                'publishingYear' => 2005,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-lord-of-the-rings-vi',
                'title' => 'The Lord of the Rings VI',
                'publishingYear' => 2006,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-lord-of-the-rings-vii',
                'title' => 'The Lord of the Rings VII',
                'publishingYear' => 2007,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-lord-of-the-rings-viii',
                'title' => 'The Lord of the Rings VIII',
                'publishingYear' => 2009,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'the-lord-of-the-rings-ix',
                'title' => 'The Lord of the Rings IX',
                'publishingYear' => 2010,
                'poster' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Movie::insert($movies);
    }
}
