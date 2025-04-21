<?php

namespace SmartDato\DbSchenker\Data;

use SmartDato\DbSchenker\Contracts\Data;

class FileData extends Data
{
    public function __construct(
        protected string $fileName,
        protected string $fileExtension,
        protected string $fileContent,
        protected string $documentType,
    ) {}

    public function build(): array
    {
        return [
            'fileName' => $this->fileName,
            'fileExtension' => $this->fileExtension,
            'fileContent' => $this->fileContent,
            'documentType' => $this->documentType,
        ];
    }
}
