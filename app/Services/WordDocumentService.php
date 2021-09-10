<?php

namespace App\Services;

use PhpOffice\PhpWord\TemplateProcessor;

class WordDocumentService
{
    public function open($path): TemplateProcessor
    {
        return new TemplateProcessor($path);
    }
}
