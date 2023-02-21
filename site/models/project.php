<?php

class ProjectPage extends Page {
public function bodytext() {
	  if($this->text()->isNotEmpty()){
		return $this->text()->value();
		} 
	else {
		return '';
	  }
  }
}
