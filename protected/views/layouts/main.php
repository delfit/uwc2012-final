<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language; ?>">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="<?php echo Yii::app()->language; ?>" />

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
		
		<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->request->baseUrl . '/js/app.js', CClientScript::POS_END ) ?>

		<title><?php echo CHtml::encode( $this->pageTitle ); ?></title>
	</head>

	<body>
		<div class="container-fluid" id="page">
			<div id="header">
				<?php
				
				// отрисовать главное меню
				$this->widget( 'bootstrap.widgets.TbNavbar', array(
					'brand' => CHtml::encode( Yii::app()->name ), 
					'brandUrl' => Yii::app()->homeUrl, 
					'collapse' => true, 
					'fluid' => false,
					'items' => array(
						array(
							'class' => 'bootstrap.widgets.TbMenu',
							'items' => $this->mainMenu,
						),
					)
				) );
				?>
		
				<?php 
				// хлебные крошки
				if( isset( $this->breadcrumbs ) ) {
					$this->widget( 'bootstrap.widgets.TbBreadcrumbs', array(
						'links' => $this->breadcrumbs,
					) );
				}
				?>
			</div>
			

			<?php echo $content; ?>
			

			<div class="clear"></div>
			
			
			<div id="footer">
				&copy; Delfit <?php echo date( 'Y' ); ?><br/>
				<?php echo Yii::powered(); ?>
			</div><!-- footer -->

		</div><!-- page -->
		
	</body>
</html>
