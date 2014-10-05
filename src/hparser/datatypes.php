<?php
	/**
	 * All types inherit from DataTypes, which contains the basic
	 * casting for others objects of typing
	 */
	class DataTypes {
		protected $value;
		
		public function asString() {
			return new String((string) $this->value);
		}
		
		public function asInteger() {
			return new Integer((int) $this->value);
		}
		
		public function asDouble() {
			return (double) $this->value;
		}
		
		public function asFloat() {
			return (float) $this->value;
		}
		
		public function asNull() {
			return NULL;
		}
		
		public function let($val) {
			$this->value = $val;
			return $this;
		}
		
		public function then($clos) {
			call_user_func($clos);
			return $this;
		}
	}
	
	/**
	 * [String] type
	 * contains the extension types that may be applied for strings
	 */ 
	class String extends DataTypes {
		public function __construct($str) {
			if (!is_string($str))
				throw new Exception();
			$this->value = $str;
			return $this;
		}
		
		public function camelize() {
			$xs = $this->value;
			$xs[0] = strtoupper($xs[0]);
			for ($i = 0; $i < strlen($this->value); $i++)
				if ($this->value[$i] == " ")
					$xs[$i + 1] = strtoupper($this->value[$i + 1]);
			$this->value = $xs;
			return $this;
		}
		
		public function putStr() {
			echo $this->value;
			return $this;
		}
		
		public function putStrLn() {
			echo $this->value . "<br />\n";
			return $this;
		}
		
		public function repeat($mult) {
			$this->value = str_repeat($this->value, $mult);
			return $this;
		}
		
		public function replace($search, $replace) {
			$this->value = str_replace($search, $replace, $this->value);
			return $this;
		}
		
		public function toLowerCase() {
			$this->value = strtolower($this->value);
			return $this;
		}
		
		public function toUpperCase() {
			$this->value = strtoupper($this->value);
			return new String($this->value);
		}
	
		public function untilReaches() {
			$this->value = strtok($this->value);
			return $this;
		}
		
		public function wordCount() {
			return new Integer(str_word_count($this->value));
		}
	}
	
	/**
	 * [Integer] type
	 * contains the extension types that may be applied for integers
	 */
	class Integer extends DataTypes {
		public function __construct($int) {
			if (!is_numeric($int))
				throw new Exception();
			$this->value = $int;
			return $this;
		}
		
		public function add($val) {
			$this->value += $val;
			return $this;
		}
	}
?>
















