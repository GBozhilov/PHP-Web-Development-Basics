<?php

/**
 * Class PlainWriter
 */
class PlainWriter implements WriterInterface
{
    /**
     * @param Article $article
     * @return string
     */
    public function write(Article $article): string
    {
        $text = 'Title: ' . $article->getTitle() . PHP_EOL;
        $text .= 'Author: ' . $article->getAuthor() . PHP_EOL;
        $text .= 'Price: ' . $article->getPrice() . PHP_EOL;

        return $text;
    }

}