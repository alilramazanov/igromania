<?php

namespace App\Http\Services;


use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploadAction
{
    /**
     *
     * Этот метод сохраняет в указанную директорию
     * Метод принимает файл и путь для сохранения.
     * Возвращает путь сохраненного файла
     *
     * @param  UploadedFile  $file
     * @param $destinationPath
     * @return string
     */

    public static function handle(UploadedFile $file, $destinationPath): string{

        $fileNameWithExt = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME) . '_' . date('Y-m-d') . '.' . $fileExtension;

        $fileNameToStore = "$destinationPath/" . $fileName;

        Storage::putFileAs($destinationPath, $file, $fileName);

        return $fileNameToStore;

    }

}