<?php

class Bookshelf
{
    /**
     * Sample data for the bookshelf
     * DB records may be used in place of this
     */
    public $booklist = array(
        0 => 'Do Androids Dream of Electric Sheep?',
        1 => 'The Curious Incident of the Dog in the Night-Time',
        2 => 'The Hollow Chocolate Bunnies of the Apocalypse',
        3 => 'To Kill a Mockingbird',
        4 => 'The Unbearable Lightness of Being',
        5 => 'Midnight in the Garden of Good and Evil',
        6 => 'The Earth, My Butt, and Other Big Round Things',
        7 => 'Cloudy With a Chance of Meatballs',
        8 => 'The Perks of Being a Wallflower',
        9 => 'Me Talk Pretty One Day',
        10 => 'One Hundred Years of Solitude',
        11 => 'A Heartbreaking Work of Staggering Genius',
        12 => 'Where the Wild Things Are',
        13 => 'How to Lose Friends and Alienate People',
        14 => 'Another Bullshit Night in Suck City',
        15 => 'The Gordonston Ladies Dog Walking Club',
        16 => 'I Am America',
        17 => 'A Clockwork Orange',
        18 => 'A Thousand Splendid Suns',
        19 => 'When You Are Engulfed in Flames',
        20 => 'Extremely Loud and Incredibly Close',
        21 => 'Neverwhere',
        22 => 'The Guernsey Literary and Potato Peel Pie Society',
        23 => 'The Grapes of Wrath',
        24 => 'I Have No Mouth and I Must Scream',
        25 => 'Their Eyes Were Watching God',
        26 => 'A Confederacy of Dunces',
        27 => 'For Whom the Bell Tolls',
    );

    public function getAll($offset, $limit) 
    {
        return array_slice($this->booklist, $offset, $limit);
    }

    public function countItems()
    {
        return count($this->booklist);
    }
}
