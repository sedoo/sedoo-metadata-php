<?php

class sedoo_metadata_contact{
	const ROLE_PI = "principalInvestigator";
	const ROLE_DISTRIBUTOR = "distributor";
	const ROLE_CONTACT = "pointOfContact";

	var $name;
	var $organisation;
	var $email;
	var $role;
	var $address;
	var $zipCode;
	var $city;
	var $country;
	var $position;
	var $phone;
	var $fax;

	public function __construct(){

	}
}

class sedoo_metadata_contact_builder{
	var $c;

	public function __construct($name = null){
		$this->c = new sedoo_metadata_contact();
		$this->c->name = $name;
	}

	public function organisation($organisation){
		$this->c->organisation = $organisation;
		return $this;
	}

	public function email($email){
		$this->c->email = $email;
		return $this;
	}

	public function pointOfContact(){
		$this->c->role = sedoo_metadata_contact::ROLE_CONTACT;
		return $this;
	}
	public function distributor(){
		$this->c->role = sedoo_metadata_contact::ROLE_DISTRIBUTOR;
		return $this;
	}
	public function pi(){
		$this->c->role = sedoo_metadata_contact::ROLE_PI;
		return $this;
	}

	public function position($position){
		$this->c->position = $position;
		return $this;
	}

	public function address($address, $zipCode, $city, $country){
		$this->c->address = $address;
		$this->c->city = $city;
		$this->c->zipCode = $zipCode;
		$this->c->country = $country;
		return $this;
	}

	public function phone($phone){
		$this->c->phone = $phone;
		return $this;
	}
	public function fax($fax){
		$this->c->fax = $fax;
		return $this;
	}

	public function build(){
		return $this->c;
	}
}

?>