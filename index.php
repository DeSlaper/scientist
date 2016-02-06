<?php

require __DIR__.'/vendor/autoload.php';

// Define the controll function
$control = function($string, $name)
{
    return str_replace('|NAME|', $name, $string);
};

// Define the experimental code
$trial = function($string, $name)
{
    return preg_replace('/\|NAME\|/', $name, $string);
};

// Create the lab.
$lab = new \Scientist\Laboratory;

// Prepare the first experiment.
$experiment = $lab->experiment('Do we get the same output on the replace?')
    ->control($control)
    ->trial('Using the preg replace.', $trial);

// Set the test string.
$string = "Hello my name is |NAME|\n\nIt's time to cook a batch of blue mr White.";

// Set the replacement.
$name = 'Ray';

// Well... Let's see if it doesn't blow up and stuff
echo $experiment->run($string, $name);
