<?php
require 'vendor/autoload.php';
include('./save_frontend.php');
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$unit = "Sheet1";

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("Adhyayan.xlsx");
$sheetData = $spreadsheet->getSheetByName($unit)->toArray();

$arrayName=$sheetData;
$rowSize = count( $arrayName );
$columnSize = max( array_map('count', $arrayName) );
$start = 161;
$end = 180;

for($x=$start; $x<=$end; $x++){
      $name = $sheetData[$x][1];
      $class = $sheetData[$x][2];
      $dob = $sheetData[$x][6];
      $phone = $sheetData[$x][7];
      $father = $sheetData[$x][4];
      save($name, $class, $dob, $phone, $father, $x);
}