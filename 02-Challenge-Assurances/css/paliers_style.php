<?php 
  header("Content-type: text/css; charset=UTF-8"); 

  $color_palier =
  [
    'palier0' => 'grey',
    'palier1' => 'red',
    'palier2' => 'orange',
    'palier3' => 'green',
    'palier4' => 'blue' 
  ];

?>

#palier0 {
  color: <?php echo $color_palier['palier0'];?>;
}

#palier1 {
  color: <?php echo $color_palier['palier1'];?>;
}

#palier2 {
  color: <?php echo $color_palier['palier2'];?>;
}

#palier3 {
  color: <?php echo $color_palier['palier3'];?>;
}

#palier4 {
  color: <?php echo $color_palier['palier4'];?>;
}
