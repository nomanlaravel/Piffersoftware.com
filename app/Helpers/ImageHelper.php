<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ImageHelper
{
    /**
     * Delete image from folder and DB.
     *
     * @param string $tableName
     * @param string $columnName
     * @param mixed $columnValue
     * @param string $folderPath (like: 'uploads/images/')
     * @return bool
     */
    // public static function deleteSingleImage(string $tableName, string $columnName, $columnValue, string $folderPath = '')
    // {
    //     $record = DB::table($tableName)->where($columnName, $columnValue)->first();

    //     if (!$record) {
    //         return false;
    //     }

    //     $fileName = $record->$columnName;

    //     // Delete file
    //     $fullPath = public_path($folderPath . $fileName);
    //     if (File::exists($fullPath)) {
    //         File::delete($fullPath);
    //     }

    //     // Delete DB record
    //     DB::table($tableName)->where($columnName, $columnValue)->delete();

    //     return true;
    // }
public static function deleteSingleImage(string $table, string $idColumn, $id, string $fileColumn, string $folderPath = '')
{
    $record = DB::table($table)->where($idColumn, $id)->first();

    if (!$record || !property_exists($record, $fileColumn)) {
        Log::warning("Record not found or missing column: Table [$table], ID [$id], Column [$fileColumn]");
        return false;
    }

    // Automatically handle if fileColumn contains full or partial path
    $filePath = $record->$fileColumn;
    $fileName = basename($filePath); // ensures only filename remains

    if (!$fileName) {
        Log::info("File column [$fileColumn] is empty for record ID [$id].");
        return false;
    }

    // Build correct path
    $fullPath = public_path(rtrim($folderPath, '/') . '/' . $fileName);

    Log::info("Attempting to delete file at: $fullPath");

    // Delete file
    if (File::exists($fullPath)) {
        File::delete($fullPath);
        Log::info("File deleted: $fullPath");
    } else {
        Log::warning("File not found at path: $fullPath");
    }

    // Set DB column to null
    DB::table($table)->where($idColumn, $id)->update([
        $fileColumn => null
    ]);

    return true;
}


    public static function deleteImageFromArray(string $tableName, string $arrayColumn, string $idColumn, $idValue, string $fileToDelete, string $folderPath = '')
    {
        $record = DB::table($tableName)->where($idColumn, $idValue)->first();

        if (!$record) {
            return false;
        }

        $images = json_decode($record->$arrayColumn, true);

        if (!is_array($images) || !in_array($fileToDelete, $images)) {
            return false;
        }

        // Delete file
        $fullPath = public_path($folderPath . $fileToDelete);
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }

        // Remove file from array
        $updated = array_values(array_filter($images, fn($img) => $img !== $fileToDelete));

        DB::table($tableName)->where($idColumn, $idValue)->update([
            $arrayColumn => json_encode($updated)
        ]);

        return true;
    }

    public static function deleteImageFromCommaString(string $table, string $column, string $idColumn, $id, string $fileToDelete)
{
    $record = DB::table($table)->where($idColumn, $id)->first();

    if (!$record || !property_exists($record, $column)) return false;

    $files = array_filter(explode(',', $record->$column));

    if (!in_array($fileToDelete, $files)) return false;

    // Delete file
    $fullPath = public_path($fileToDelete);
    if (File::exists($fullPath)) {
        File::delete($fullPath);
    }

    // Remove from array and update DB
    $newFiles = array_filter($files, fn($f) => $f !== $fileToDelete);
    DB::table($table)->where($idColumn, $id)->update([
        $column => implode(',', $newFiles)
    ]);

    return true;
}



}
