<?php
    trait Walks {
        function walk() {
            $this->communicate("I'm walking");
        }
    }

    abstract class Flyer {
        abstract public function fly();
    }

    class Animal {
        use Walks;

        public $name;
        protected $age = 0;
        public $color;

        public static $counter = 0;

        function __construct($name, $color, $age) {
            $this->name = $name;
            $this->color = $color;
            $this->age = $age;

            self::$counter += 1;
        }

        function communicate($text) {
            echo $this->name . ": $text <br />";
        }
    }

    class Insect {
        use Walks;

        public $name;
        protected $age;
        public $color;

        function __construct($name, $color, $age) {
            $this->name = $name;
            $this->color = $color;
            $this->age = $age;
        }

        function communicate($text) {
            var_dump($this->name . ": $text zzzz");
            echo "<br />";
        }
    }

    class Cat extends Animal {
        private $tail_length;

        function meow($text = "Meow!") {
            $this->communicate($text);
        }
    }

    class Dog extends Animal {
        public $species;


        function bark($text = "Bark!") {
            $this->communicate($text);
        }

        function say_age() {
            $this->bark($this->age);
        }

        static function initiateDoberman($name) {
            $dog = new Dog($name, "black", 0);
            $dog->species = "Doberman";

            return $dog;
        }

        static function initiateBullterier($name) {
            $dog = new Dog($name, "black", 0);
            $dog->species = "Bullterier";

            return $dog;
        }
    }



    class Fly extends Insect {
        function bzz($text = "Bzz!") {
            $this->communicate($text);
        }
    }

    class Pigeon extends Flyer {
        public function fly() {
            echo "Fly";
        }
    }

    $pigeon = new Pigeon();
    $pigeon->fly();

    $badijs = Dog::initiateDoberman("Badijs");
    $zobits = Dog::initiateBullterier("Zobīts");

    $muris = new Cat("Muris", "red", 3);
    $zelda = new Cat("Zelda", "black", 2);
    $reksis = new Dog("Rex", "brown", 4);
    $zuze = new Fly("Zuze", "gray", 0.1);

    $muris->meow("Čau!");
    $zelda->meow();
    $zuze->bzz();
    $reksis->say_age();

    $muris->walk();
    $reksis->walk();
    $zuze->walk();
    $badijs->bark();
    $zobits->bark();

    echo Animal::$counter;
?>
