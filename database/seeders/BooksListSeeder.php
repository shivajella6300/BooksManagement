<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BooksListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books_lists')->insert([
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'publish_date' => '1960-07-11', // Full date format: YYYY-MM-DD
                'genre' => 'Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'publish_date' => '1949-06-08',
                'genre' => 'Dystopian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'publish_date' => '1813-01-28',
                'genre' => 'Romance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'publish_date' => '1937-09-21',
                'genre' => 'Fantasy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'publish_date' => '1951-07-16',
                'genre' => 'Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'publish_date' => '1925-04-10',
                'genre' => 'Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Moby Dick',
                'author' => 'Herman Melville',
                'publish_date' => '1851-10-18',
                'genre' => 'Adventure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'War and Peace',
                'author' => 'Leo Tolstoy',
                'publish_date' => '1869-01-01',
                'genre' => 'Historical Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Odyssey',
                'author' => 'Homer',
                'publish_date' => '800-01-01',
                'genre' => 'Epic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Frankenstein',
                'author' => 'Mary Shelley',
                'publish_date' => '1818-01-01',
                'genre' => 'Science Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
