<?php

function getBooks()
{
    $books = [
        [
            "id" => 1,
            "title" => "Laskar Pelangi",
            "isbn" => "978-979-3062-79-2",
            "category" => "Fiksi",
            "category_id" => 1,
            "year" => 2005,
            "stock" => 12,
            "description" => "Novel yang menceritakan perjuangan anak-anak Belitung dalam mendapatkan pendidikan.",
            "authors" => [
                "Andrea Hirata"
            ],
            "author_ids" => [
                1
            ],
        ],
        [
            "id" => 2,
            "title" => "Bumi",
            "isbn" => "978-602-03-0112-9",
            "category" => "Fiksi",
            "category_id" => 1,
            "year" => 2014,
            "stock" => 8,
            "description" => "Novel karya Tere Liye yang menceritakan petualangan Raib dan teman-temannya.",
            "authors" => [
                "Tere Liye"
            ],
            "author_ids" => [
                2
            ],
        ],
        [
            "id" => 3,
            "title" => "Harry Potter dan Batu Bertuah",
            "isbn" => "978-979-22-1700-0",
            "category" => "Fiksi",
            "category_id" => 1,
            "year" => 1997,
            "stock" => 5,
            "description" => "Petualangan Harry Potter saat pertama kali memasuki dunia sihir.",
            "authors" => [
                "J.K. Rowling"
            ],
            "author_ids" => [
                3
            ],
        ],
        [
            "id" => 4,
            "title" => "Bumi Manusia",
            "isbn" => "978-979-97312-3-4",
            "category" => "Sejarah",
            "category_id" => 2,
            "year" => 1980,
            "stock" => 6,
            "description" => "Novel sejarah yang menggambarkan kehidupan masyarakat Indonesia pada masa kolonial.",
            "authors" => [
                "Pramoedya Ananta Toer"
            ],
            "author_ids" => [
                4
            ],
        ],
        [
            "id" => 5,
            "title" => "Antologi Rasa Nusantara",
            "isbn" => "978-602-1234-56-7",
            "category" => "Fiksi",
            "category_id" => 1,
            "year" => 2021,
            "stock" => 4,
            "description" => "Kumpulan cerita yang menggambarkan keberagaman rasa dan budaya Nusantara.",
            "authors" => [
                "Pramoedya Ananta Toer",
                "Sapardi Djoko Damono"
            ],
            "author_ids" => [
                4,
                5
            ],
        ],
    ];

    return $books;
}

function getBook()
{
    $books = getBooks();

    return $books[0] ?? null;
}