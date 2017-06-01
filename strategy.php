<?php echo "Strategy Design pattern"; ?>
<br/>
<?php

class Animal {
	
	public $flyingType;
	
	public function tryToFly(){
		return $this->flyingType->fly();
	}
	
	public function setFlyingAbility($newFlyType) {
		$this->flyingType = $newFlyType;
	}
}

class Dog extends Animal {
	public function __construct(){
		$this->setFlyingAbility(new CantFly());
	}
}

class Bird extends Animal {
	public function __construct(){
		$this->setFlyingAbility(new CanFly());
	}
}

interface Flys {
	public function fly();
}

class CanFly implements Flys {
	public function fly() {
		return "Flying High";
	}
}

class CantFly implements Flys {
	public function fly() {
		return "I cant fly";
	}
}

?>

<?php
$dog = new Dog();
print "Dog => ".$dog->tryToFly();
?>

<br/>

<?php
$bird = new Bird();
print "Bird => ".$bird->tryToFly();
?>

<br/>

<?php
$doggie = new Dog();
$doggie->setFlyingAbility(new CanFly());
print "Doggie => ".$doggie->tryToFly();
?>