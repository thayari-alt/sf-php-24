<!-- Предположим, у нас есть игра в автотематике. У нас есть машины, танки, спецтехника, которые имеют свой набор характеристик, умеют ехать вперед и назад, а некоторые могут даже размахивать ковшом. На основе этой информации постройте классы с использованием абстрактного класса и интерфейса. Напишите принимающую объект машины функцию, которая бы заставляла ее ехать и вызвала одну из способностей машины. Пусть, если это легковое авто, будет закись азота, если это бульдозер, — управление ковшом. Принимающая функция должна быть полиморфной. Необходимо реализовать только структуру. -->

<?
interface VehicleInterface
{
  public function moveForward();
  public function moveBackward();
  public function honkHorn();
  public function special();
}

abstract class Vehicle implements VehicleInterface
{
  public function moveForward() {
    return 'vehicle moves forward';
  }
  public function moveBackward() {
    return 'vehicle moves backwards';
  }
  public function honkHorn() {
    return 'beep!';
  }
  public function special() {
    return 'noching special';
  }
}

class Bulldozer extends Vehicle
{
  public function special() {
    return $this->useBlade();
  }

  public function useBlade() {
    return 'pushing sand';
  }
}

class Car extends Vehicle
{
  public $design = [
    'color'=>'black',
    'interior'=>'faux leather'
  ];

  public function special() {
    return $this->useNitrousOxide();
  }

  public function useNitrousOxide() {
    return 'wrrroooom!';
  }

  public function turnOnWipers() {
    return 'cleaning the windshield';
  }
}

function go(Vehicle $vehicle) {
  echo $vehicle->moveForward().'<br/>';
  echo $vehicle->special().'<br/>';
}

$dozer = new Bulldozer();
$renault = new Car();
go($dozer);
go($renault);

$renault->design['color'] = 'red';
print_r($renault->design);