<?php
// Magic constants
echo __DIR__ . "<br>";
echo __FILE__ . "<br>";

// Create directory
// mkdir("test");


// Rename directory
// rename('test', 'tests');
// Delete directory
// rmdir("tests");

// Read files and folders inside directory
echo file_get_contents('lorem.txt');


// file_get_contents, file_put_contents

$files = scandir('./');


echo '<pre>';
var_dump($files);
echo '<pre>';


// file_get_contents from URL
file_put_contents("myfile.txt", "the content");

file_get_contents("https://jsonplaceholder.typicode.com/users");



// https://www.php.net/manual/en/book.filesystem.php
// file_exists
// is_dir
// filemtime
// filesize
// disk_free_space
// file