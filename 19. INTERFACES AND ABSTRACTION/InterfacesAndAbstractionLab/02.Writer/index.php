<?php

spl_autoload_register();

$writerName = 'JSON';
$writerName .= 'Writer';

$article = new Article('Title', 'Author', 20.5);

try {
    $writer = Factory::getWriter($writerName);
    echo $writer->write($article);
} catch (Exception $ex) {
    echo $ex->getMessage();
}