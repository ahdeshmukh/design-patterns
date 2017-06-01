When to use?
When you need many other objects to receive an update when another object changes
eg: Stock market
Positives: The publisher does not need to no anything about observers
Negatives: The publisher may send updates that do not matter to the observer

<?php

public interface Publisher() {
	public function register($observer);
	public function unregister($observer);
	public function notifyObserver();
}

public interface Observer() {
	public function update($ibmPrice, $aaplPrice, $googPrice);
}

public class StockGrabber implements Publisher() {
	private $observers, $ibmPrice, $aaplPrice, $googPrice;
	
	public function __construct() {
		$this->observers = array();
	}
	
	public function register($newObserver) {
		$observers[] = $newObserver;
	}
	
	public function unregister($deleteObserver) {
		if(array_key_exists ($deleteObserver , $this->observers)) {
			$observerIndex = array_search($deleteObserver, $this->observers);
			unset($this->observers[$observerIndex]);
		}
	}
	
	public function notifyObserver() {
		
	}

}

?>