<?php

namespace Core;


class Template implements TemplateInterface
{
    private const TEMPLATE_FOLDER = 'app/Templates/';
    private const TEMPLATE_EXTENSION = '.php';

    public function render(string $templateName, $data, array $errors = []): void
    {
        require_once self::TEMPLATE_FOLDER . $templateName . self::TEMPLATE_EXTENSION;
    }
}