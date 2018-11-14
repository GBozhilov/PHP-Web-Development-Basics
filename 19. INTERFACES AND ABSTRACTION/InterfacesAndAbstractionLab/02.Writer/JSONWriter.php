<?php

class JSONWriter implements WriterInterface
{
    public function write(Article $article): string
    {
        return json_encode($article);
    }

}