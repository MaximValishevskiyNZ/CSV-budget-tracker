<?php

declare(strict_types = 1);

function getCSV() {
   $csv_list = array_slice(scandir(FILES_PATH) , 2);
   $res = [];
   
   foreach($csv_list as $csv_name)
   {
      if(($file = fopen(FILES_PATH . '\\' . $csv_name, 'r')) !== false) 
      {
         while(($line = fgetcsv($file, 1000, ",")) !== false) 
         {
            $res[] = explode(',', $line[0]);
         }
      }
     
   }
   
   return $res;
}


function sortDate($a, $b) 
{
   return strtotime($a["0"]) - strtotime($b["0"]);
}

function getIncome($ar)
{
   $res = 0;
   foreach($ar as $line) 
   {
      $num = str_replace(['"', '$'], '',$line[3]);
      if ($num > 0)
      {
         
         $res += $num;
      }
   }
   return $res;
}

function getExpense($ar)
{
   $res = 0;
   foreach($ar as $line) 
   {
      $num = str_replace(['"', '$'], '',$line[3]);
      if ($num < 0)
      {
         
         $res += $num;
      }
   }
   return $res;
}

function getNetTotal($ar)
{
   $res = 0;
   foreach($ar as $line) 
   {
      $num = str_replace(['"', '$'], '',$line[3]);
      $res += $num;
   }
   return $res;
}