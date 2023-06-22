<?php 
namespace App\Repositories;

class Calculate {
   public function sum() {
        $number1 = 12;
        $number2 = 20;
        $sumThisNumber = $number1 + $number2;
        return $sumThisNumber;
   }
   public function substruction() {
        $number1 = 12;
        $number2 = 20;
        $subThisNumber = $number1 - $number2;
        dd($subThisNumber);
   }
}

