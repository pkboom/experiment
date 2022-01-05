<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\SimpleExcel\SimpleExcelReader;

Route::get('/', function (Request $request) {
    // $json = SimpleExcelReader::create(storage_path('portuguese.xlsx'))->getRows()
    //     ->mapWithKeys(function (array $rowProperties) {
    //         return [trim($rowProperties['Recommendation']) => trim($rowProperties['Recomendações'])];
    //     })->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    // file_put_contents(storage_path('pt.json'), $json);

    $json = SimpleExcelReader::create(storage_path('portuguese.xlsx'))->getRows()
        ->filter(function ($rowProperties) {
            return trim($rowProperties['Drug_class']) !== trim($rowProperties['Classe_da_Droga']);
        })
        ->unique()
        ->mapWithKeys(function (array $rowProperties) {
            return [trim($rowProperties['Drug_class']) => trim($rowProperties['Classe_da_Droga'])];
        })->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    file_put_contents(storage_path('pt.json'), $json);
});
