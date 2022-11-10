<?php
declare(strict_types = 1);
/*
   Interface Example :An example of duck typing in PHP
*/
interface CanFly {
  public function fly();
}

interface CanSwim {
  public function swim();
}

class Bird {
  public function info() {
    echo "I am a {$this->name} <br />";
    echo "I am a bird <br />";
  }
}

/**
* some implementations of birds
*/
class Dove extends Bird implements CanFly {
  var $name = "Dove";
  public function fly() {
    echo "I can fly <br />";
  }
}

class Penguin extends Bird implements CanSwim {
  var $name = "Penguin";
  public function swim() {
    echo "I can swim <br />";
  }
}

class Duck extends Bird implements CanFly, CanSwim {
  var $name = "Duck";
  public function fly() {
    echo "I can fly <br />";
  }
  public function swim() {
    echo "I can swim <br />";
  }
}

class Kiwi extends Bird {
  var $name = "Kiwi";
  }

?>

<?php

/**
* a simple function to describe a bird
*/
function describe($bird) {
  if ($bird instanceof Bird) {
    $bird->info();
    if ($bird instanceof CanFly) {
      $bird->fly();
    }
    elseif ($bird instanceof CanSwim) {
      $bird->swim();
    }
	else {
		echo "I can't fly or swim!! ";
	}
  } else {
    die("This is not a bird. I cannot describe it.");
  }
}

// describe these birds please
describe(new Penguin);
echo "--- <br />";

describe(new Dove);
echo "---<br />";

describe(new Duck);
echo "---<br />";

describe(new Kiwi);

