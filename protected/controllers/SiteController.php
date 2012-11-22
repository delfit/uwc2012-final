<?php

class SiteController extends Controller
{


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		$this->render(
			'index'
		);
	}
        
        public function actionView() {
            $form = new ProductForm();
            if(isset($_GET['ProductForm'])){
                $form->attributes = $_GET['ProductForm'];
                if( $form->validate() ) {
                    
                }
                else {
                    print_r( $form->getErrors() );
                }
            }
            $this->render(
                        'view',
                        array(
                            'products'=>array(
                                array(
                                    'id' => '1',
                                    'name' => 'base'
                                ),
                                array(
                                    'id' => '2',
                                    'name' => 'form'
                                )
                            ),
                            'model' => $form
                        )
                );
        }
        
        public function actionResponse() {
            $this->render(
                    'response',
                    array(
                        'model' => new ResponseForm()
                    )
            );
        }
		
		public function actionProfile() {
			$form = new ProfileForm();
			
			$form->id = 1; 
			$form->firstName = 'John'; 
			$form->lastName = 'White'; 
			$form->pictureUrl = 'http://placehold.it/200x250';
			$form->publicProfileUrl = '';
			$form->headline = 'Headline'; 
			$form->currentStatus = 'Status'; 
			$form->location = 'USA';
			$form->distance = ''; 
			$form->summary = '';
			$form->industry = ''; 
			$form->specialties = '';
			$form->positions = '';
			$form->educations = '';
			
			$this->render(
					'profile',
				array(
					'model'=>$form
				)
			);
		}


	/**
	 * This is the action to handle external exceptions.
	 * 
	 */
	public function actionError() {
		if( $error = Yii::app()->errorHandler->error ) {
			if( Yii::app()->request->isAjaxRequest ) {
				echo $error[ 'message' ];
			}
			else {
				$this->render( 'error', $error );
			}
		}
	}

}