<?php

//Task 1

/* class Car{

    public $make;
    public $model;
    public $year;

public function printCar()
{
echo "Make:" . $this->make . "<br>";;
echo "Modle:" . $this->model . "<br>";;
echo "Year:" . $this->year . "<br>";;

}

}
$obj = new Car();
$obj->make = "Toyota";
$obj->model =  "Camry";
$obj->year = "2020";
$obj->printCar();

//$obj->printCar("Toyota","Camry","2020");
 */

//   Task2
/*  
class Vehicle{
  
    public function __call($name, $arguments)
    {
        if($name == "typeCar")
        echo "Type: Car <br>";
        elseif($name == "typeBike"){
            echo "Type: Bike <br>";
        }else {
            echo "Method $name does not exist! <br>";
        }
    }
   
    
   public function move(){
    echo "The vehicle is moving <br>";
   }
}
class Car extends Vehicle{

   

    public function move(){
        echo "The Car is moving on the road. <br>";
        
       }
}
$objType = new Vehicle();
$objType->typeCar();
$moveCar = new Car();
$moveCar->move();

class bike extends Vehicle{

    public function move(){
        echo "The Bike is moving on the road. <br>";
       
       }
}
echo "---------------------------------- <br>";
$objType->typeBike();
$moveBike = new bike();
$moveBike->move();
 */

 //     Task 3
/* 
 class Car{

    private $make;
    private $model;
    private $year;

    public function setMake($make){
          
        $this->make = $make;
    }
    public function getMake(){
        return $this->make;
    }

    public function setModel($model){
        $this->model = $model;
    }
    public function getModel(){
        return $this->model;
    }
    public function setYear($year){
      $this->year = $year;
    }
    public function getYear(){
        return $this->year;
    }

public function printCar()
{
echo "Make:" . $this->getMake() . "<br>";;
echo "Modle:" . $this->getModel() . "<br>";;
echo "Year:" . $this->getYear() . "<br>";;
}

}
$myCar = new Car();
$myCar->setMake("Toyota");
$myCar->setModel("Camry");
$myCar->setYear("2020");

$myCar->printCar();
 */

 // Task 4 

 abstract class shape{
    abstract public function calculateArea();

 }

 class circle extends Shape {
    private $radius;
    public function __construct($radius){
        $this->radius = $radius;
    }

     public function calculateArea() {
        return pi() * pow($this->radius, 2); 
    }
        
    }
    class Rectangle extends Shape {
        private $width;
        private $height;
    
        public function __construct($width, $height) {
            $this->width = $width;
            $this->height = $height;
        }
        public function calculateArea(){
            return $this->width * $this->height; 
        }
    
    }
    $circle = new Circle(5);
echo "Circle Area: " . $circle->calculateArea() . "<br>";


$rectangle = new Rectangle(4, 6);
echo "Rectangle Area: " . $rectangle->calculateArea() . "<br>";
 
?>