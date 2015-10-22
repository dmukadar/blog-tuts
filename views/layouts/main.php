<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Alert;
use yii\base\Widget;
use app\components\HelloWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- ******HEADER****** --> 
    <header class="header">
    	<div class="container">                       
            <img class="profile-image img-responsive pull-left" src="../vendor/bower/developer/assets/images/profile.png" alt="James Lee" />
            <div class="profile-content pull-left">
                <h1 class="name">James Lee</h1>
                <h2 class="desc">Web App Developer</h2>   
                <ul class="social list-inline">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>                   
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-github-alt"></i></a></li>                  
                    <li class="last-item"><a href="#"><i class="fa fa-hacker-news"></i></a></li>                 
                </ul> 
            </div><!--//profile-->
        </div><!--//container-->
    </header><!--//header-->
    
    
    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12">
	            <section class="about section">
					<div class="section-inner">
				        <?= $content ?>
		        	</div>
		        </section>
            </div><!--//primary-->
            
            <div class="secondary col-md-4 col-sm-12 col-xs-12">
                 <aside class="info aside section">
                    <div class="section-inner">
                        <h2 class="heading sr-only">Basic Information</h2>
                        <div class="content">
                        	<?php 
						    	echo Nav::widget([
						    			'items' => [
						    					['label' => 'Home', 'url' => ['/site/index']],
						    					['label' => 'About', 'url' => ['/site/about']],
						    					['label' => 'Contact', 'url' => ['/site/contact']],
						    					['label' => 'Post', 'url' => ['/post/']],
						    					Yii::$app->user->isGuest ?
						    					['label' => 'Login', 'url' => ['/site/login']] :
						    					[
						    							'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
						    							'url' => ['/site/logout'],
						    							'linkOptions' => ['data-method' => 'post']
						    					],
						    			],
						    	]);
					    	?>
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </aside><!--//aside-->
                
                <aside class="list music aside section">
                    <div class="section-inner">
                        <h2 class="heading">Recent Comment</h2>
                        <div class="content">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-headphones"></i> <a href="#">Etiam hendrerit urna nunc</a></li>
                                <li><i class="fa fa-headphones"></i> <a href="#">Ut sollicitudin in mauris non auctor</a></li>
                                <li><i class="fa fa-headphones"></i> <a href="#">Etiam hendrerit urna nunc</a></li>
                                <li><i class="fa fa-headphones"></i> <a href="#">Duis et felis bibendum</a></li>
                            </ul>
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
                
                <aside class="list conferences aside section">
                    <div class="section-inner">
                        <h2 class="heading">Tag</h2>
                        <div class="content">
                            <?= HelloWidget::widget(['message' => ' Yii2.0'])?>
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
                
                <aside class="blog aside section">
                    <div class="section-inner">
                        <h2 class="heading">Latest Blog Posts</h2>
                        <p>You can use Sascha Depold's <a href="https://github.com/sdepold/jquery-rss" target="_blank">jQuery RSS plugin</a> to pull in your blog post feeds.</p>
                        <div id="rss-feeds" class="content">

                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
              	
            </div><!--//secondary-->    
        </div><!--//row-->
    </div><!--//masonry-->
    
    
    <!-- ******FOOTER****** --> 
    <footer class="footer">
        <div class="container text-center">
               <p class="copyright">&copy; My Company <?= date('Y') ?></p>
               <p class="fa fa-heart"><?= Yii::powered() ?></p>
        </div><!--//container-->
    </footer><!--//footer-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<?php 
/*
 
  <div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

  
 */
?>