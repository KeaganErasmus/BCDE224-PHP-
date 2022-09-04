<?php
	header( 'Content-Type: application/json' );

	class Fib3 {
		private $n;
		protected $sum = 0;
		protected $data = array( 1, 1 );

		public function __construct($newN) {
			$this->n = $newN;
		}

		public function fib3calc() {
			$f1 = 1;
			$f2 = 1;
			$sum = 0;
			for ($i = 3; $i <= $this->n; $i++ ) 
			{
				$fn = $f1 + $f2;
				$sum += $fn;
				$this->data[] = $fn;
				//echo $sum;
				$f2 = $f1;
				$f1 = $fn;
				
			}
		}
		public function get() 
		{
			return $this->data;
		}
	}
	$fib3 = new Fib3(0);
	
	$query = $_SERVER[ 'QUERY_STRING' ];
	if(isset($_SERVER [ 'QUERY_STRING' ]))
	{
			$fib3 = new Fib3( $query );
			$fib3 -> fib3calc();
	}
	echo json_encode($fib3->get());
