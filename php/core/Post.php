<?php

// Defines a simple class that represents a playlist.
class Playlist
{
    // Public property to store the playlist name.
    public $name;

    // Constructor method: PHP automatically calls this when you create a new
    // Playlist object, and it accepts the initial playlist name as input.
    public function __construct($name)
    {
        // Assign the incoming name to the current object ($this) so the value
        // is saved on the instance and can be accessed later as $playlist->name.
        $this->name = $name;
    }
}

// Create a Playlist object with an initial name. IMPLEMENTATION EXAMPLE:
$playlist = new Playlist('My Favorite Songs');

class Team
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

$team = new Team('Tigers');
