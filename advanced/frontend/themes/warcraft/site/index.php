<?php

/* @var $this yii\web\View */

$this->title = 'The Best Hero Blog';
?>
<style type="text/css">
    #tagcloud {
    width: 300px;
    background:#CFE3FF;
    color:#0066FF;
    padding: 10px;
    border: 1px solid #559DFF;
    text-align:center;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
}
 
#tagcloud a:link, #tagcloud a:visited {
    text-decoration:none;
    color: #333;
}
 
#tagcloud a:hover {
    text-decoration: underline;
}
 
#tagcloud span {
    padding: 4px;
}
 
#tagcloud .smallest {
    font-size: x-small;
}
 
#tagcloud .small {
    font-size: small;
}
 
#tagcloud .medium {
    font-size:medium;
}
 
#tagcloud .large {
    font-size:large;
}
 
#tagcloud .largest {
    font-size:larger;
}    
</style>
<div class="site-index">

    <div class="jumbotron">
        <h1>Post terbaru</h1>
        <p>&nbsp;</p>        
    </div>

    <div class="body-content">
        <div class="col-md-6">
            <div class="row">
                <?php foreach ($posts as $key => $post) { ?>
                    <div class="col-lg-12">
                        <h2><?php echo $post->title; ?></h2>
                        <p><?php echo $post->content; ?></p>
                        <p><a class="btn btn-default" href="#">Read More &raquo;</a></p>
                    </div> <?php                        
                } ?>
            </div>
        </div>
        
    </div>

    <div class="jumbotron">
        <h1>Komentar terbaru</h1>
    </div>
    <div class="body-content">
        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-12">
                    <?php //foreach ($komentars as $key => $komentar) {
                        print_r($komentars['content']);
                   // }
                     ?>
                </div>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="jumbotron">
        <h1>Terpopuler</h1>
    </div>

    
<div id="tagcloud">
<?php 
// start looping through the tags
$maximum=0;
foreach ($terms as $term):
    //print_r($term);
    //$term['counter']=$term['frequency'];
    //$term['term']=$term['name'];

 // determine the popularity of this term as a percentage
    if ($term['frequency']>$maximum) {$maximum=$term['frequency'];}
 $percent = floor(($term['frequency'] / $maximum) * 100);
 
 // determine the class for this term based on the percentage
 if ($percent < 20): 
   $class = 'smallest'; 
 elseif ($percent >= 20 and $percent < 40):
   $class = 'small'; 
 elseif ($percent >= 40 and $percent < 60):
   $class = 'medium';
 elseif ($percent >= 60 and $percent < 80):
   $class = 'large';
 else:
 $class = 'largest';
 endif;
?>
<span class="<?php echo $class; ?>">
  <a href="search.php?search=<?php echo $term['name']; ?>"><?php echo $term['name']; ?></a>
</span>
<?php 

endforeach; ?>
</div>
</div>
