<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker\Data;

use SmartDato\DbSchenker\Contracts\Data;

final class FileData extends Data
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
