<?php
	class ProfileForm extends CFormModel{
        public $id;
        public $firstName;
		public $lastName;
        public $pictureUrl;
		public $publicProfileUrl;
        public $headline;
		public $currentStatus;
        public $location;
		public $distance;
        public $summary;
		public $industry;
        public $specialties;
		public $positions;
        public $educations;
		
		public function hasAttribute() {
			return true;
		}
		
		public function getAttribute( $attrName ) {
			return $this->{$attrName};
		}
		
		public $primaryKey = 1;
    }
?>
