<?php

class Validation{
	/* USED AS A FLAG CHANGES TO TRUE IF ONE OR MORE ERRORS IS FOUND */
	private $error = false;

	/* CHECK FORMAT IS BASCALLY A SWITCH STATEMENT THAT TAKES A VALUE AND THE NAME OF THE FUNCTION THAT NEEDS TO BE CALLED FOR THE REGULAR EXPRESSION */
	public function checkFormat($value, $regex)
	{
		switch($regex){
			case "name": return $this->name($value); break;
			case "phone": return $this->phone($value); break;
			case "address": return $this->address($value); break;
			case "email": return $this->email($value); break;
			case "date": return $this->date($value); break;
			
			
		}
	}


		
	/* THE REST OF THE FUNCTIONS ARE THE INDIVIDUAL REGULAR EXPRESSION FUNCTIONS*/
	private function name($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}

	private function phone($value){
		$match = preg_match('/\d{3}\.\d{3}.\d{4}/', $value);
		return $this->setError($match);
	}

	private function address($value){
		/* regex checks for leading numbers (more than single digitis) single word with any character (ex: N.) and then 1-4 main words for the street name and then finally makes sure the string ends with a word ending with any regular character. */
		$match = preg_match('/^(\d{2,})(\s\w.\s)?(\b\w*(-?\w*?)\b\s){1,4}(\w*.$)/im', $value);
		return $this->setError($match);
	}

	private function email($value){
		$match = preg_match('/^\S+@\S+\.\S+$/i', $value);
		return $this->setError($match);
	}

	private function date($value){
		$match = preg_match('/([1-9]|0[1-9]|1[012]).([1-9]|0[1-9]|1[0-9]|2[0-9]|3[01]).([12][0-99])?([0-9]{2})$/m' , $value);
		return $this->setError($match);
	}

	private function setError($match){
		if(!$match){
			$this->error = true;
			return "error";
		}
		else {
			return "";
		}
	}


	/* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
	public function checkErrors(){
		return $this->error;
	}
	
}