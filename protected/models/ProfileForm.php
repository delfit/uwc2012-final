<?php
	class ProfileForm extends CFormModel{	
        public $id;
        public $firstName;
		public $lastName;
        public $pictureURL;
		public $publicURL;
        public $headLine;
		public $currentStatus;
        public $locationName;
		public $locationCountryCode;
		public $distance;
        public $summary;
		public $industry;
        public $specialties;
		public $positions;
        public $educations;
		
		public function rules() {
			return array(
				array( 'firstName, lastName, publicURL, headLine, currentStatus, locationName, locationCountryCode, distance, summary, industry, specialties, positions, educations', 'length', 'min' => 5 ),
			);
		}
		
		public function hasAttribute() {
			return true;
		}
		
		public function getAttribute( $attrName ) {
			return $this->{$attrName};
		}
		
		public $primaryKey = 1;
    
		
		public function getTableSchema() {
			return (object) array( 'columns' => array() );
		}
	}
?>
