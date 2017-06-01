When to use?
When the method returns one of several possible classes that share a superclass. used for classes chosen at runtime which have same super class. when you don't know ahead of time what class object you need.

<br/>

<?php

abstract class Animal {
	
	private $name;
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function displayName() {
		echo $this->getName().' object has been created';
	}
	
	public function makeNoise() {
		echo $this->getName().' makes noise';
	}
	
}

class Dog extends Animal {
	
	public function __construct() {
		$this->setName('Dog');
	}
	
	public function makeNoise() {
		echo $this->getName().' barks';
	}
	
}

class Cat extends Animal {
	
	public function __construct() {
		$this->setName('Cat');
	}
	
	public function makeNoise() {
		echo $this->getName().' meows';
	}
	
}

class AnimalFactory {
	
	private $animal;
	
	public function __construct($animal) {
		$this->animal = $animal;
	}
	
	public function getAnimalObject() {
		$animalObject = null;
		if($this->animal === 'dog') {
			$animalObject = new Dog();
		} else if($this->animal === 'cat') {
			$animalObject = new Cat();
		}
		
		return $animalObject;
	}
	
}

if(isset($_GET['animal'])) {
	$animalFactory = new AnimalFactory($_GET['animal']);
	$animal = $animalFactory->getAnimalObject();
	if($animal) {
		$animal->displayName();
		$animal->makeNoise();
	}
} else {
	echo "No animal can be created.";
}

?>