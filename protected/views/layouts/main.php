<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language; ?>">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="<?php echo Yii::app()->language; ?>" />

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
		
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slimbox2.css" media="screen" />
		
		<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->request->baseUrl . '/js/app.js', CClientScript::POS_END ) ?>
		<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->request->baseUrl . '/js/slimbox2.js', CClientScript::POS_END ) ?>

		<title><?php echo CHtml::encode( $this->pageTitle ); ?></title>
	</head>

	<body>
		<div class="container-fluid" id="page">
			<div id="header">
				<?php
				
				
				// создать меню управления
				if( Yii::app()->user->isGuest ) {
					$configMenuItem = array(
						'icon' => 'cog',
						'items' => array(
							array( 'label' => Yii::t( 'application', 'Login' ), 'url' => Yii::app()->createUrl( '/site/login' ), 'icon' => 'user' ),
						)
					);
				}
				else {
					$configMenuItem = array(
						'icon' => 'cog',
						'items' => array(				
							array( 'label' => Yii::t( 'application', 'Logout' ), 'url' => Yii::app()->createUrl( 'site/logout' ), 'icon' => 'off' ),
						)
					);
				}
				
				// отрисовать главное меню
				$this->widget( 'bootstrap.widgets.TbNavbar', array(
					'brand' => CHtml::encode( Yii::app()->name ), 
					'brandUrl' => Yii::app()->homeUrl, 
					'collapse' => true, 
					'fluid' => true,
					'items' => array(
						array(
							'class' => 'bootstrap.widgets.TbMenu',
							'items' => array(
								array( 'label' => 'Альбомы', 'url' => Yii::app()->createUrl( 'album/list' ), 'active' => ( Yii::app()->controller->getRoute() == 'album/list' ) ),
							),
						),
						
						array(
							'class' => 'bootstrap.widgets.TbMenu',
							'htmlOptions' => array(
								'class' => 'pull-right'
							),
							'items' => array( 
								$configMenuItem 
							),
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
