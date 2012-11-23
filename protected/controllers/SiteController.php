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