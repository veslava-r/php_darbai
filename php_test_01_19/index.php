<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        class Converter {
          function __construct($value){
            $this->elements = str_split(strval($value));
          }

          function getElements(){
            return $this->elements; 
          }

          function toBinary(){
            $result = [];

            foreach ($this->toDecimal() as $dec) {
              $result[] = decbin($dec);
            }

            return $result;
          }

          function toOctal(){
            $result = [];

            foreach ($this->toDecimal() as $dec) {
              $result[] = decoct($dec);
            }

            return $result;
          }

          function toHex(){
            $result = [];

            foreach ($this->toDecimal() as $dec) {
              $result[] = dechex($dec);
            }

            return $result;
          }

          function toDecimal(){
            $result = [];

            foreach ($this->elements as $char) {
              $result[] = ord($char);
            }

            return $result;
          }

          function print(){
            echo "Original: " . implode($this->getElements()) . "<br/>";
            echo "Decimal: " . implode($this->toDecimal()) . "<br/>";
            echo "Binary: " . implode($this->toBinary()) . "<br/>";
            echo "Octal: " . implode($this->toOctal()) . "<br/>";
            echo "Hex: " . implode($this->toHex()) . "<br/>";
          }
        }

        class ArrayConverter {
          function __construct($arr){
            $this->array = $arr;
          }

          function getSecondElementConverter(){
            $element = array_values($this->array)[1];
            return new Converter($element);
          }

          function getThirdFromEndElementConverter(){
            $count = count($this->array);
            $element = array_values($this->array)[$count - 2];
            return new Converter($element);
          }
        }

        $arr1 = ["pienas", "labas", "trecias"];
        $arr2 = ["7" => "pienas", "pieva" => "labas", "trec" => "ias"];

        $ac1 = new ArrayConverter(["pienas", "labas"]);
        $ac2 = new ArrayConverter(["7" => "pienas", "pieva" => "labas"]);

        $ac1->getSecondElementConverter()->print();
        echo "<br/>";

        $ac2->getSecondElementConverter()->print();
        echo "<br/>";

        $ac1->getThirdFromEndElementConverter()->print();
        echo "<br/>";

        $ac2->getThirdFromEndElementConverter()->print();
        echo "<br/>";
        ?>
    </body>
</html>
