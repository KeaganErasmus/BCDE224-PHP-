<?php
$pattern = '/[^\w]fox\s/';
if (preg_match($pattern, 'The quick brown fox jumps over the lazy dog'))
  {
  echo "'fox' is present..."."\n";
  }
  else
  echo "'fox' is not present..."."\n";
?>

<?php  
$str1 = 'The quick brown fox';  
echo preg_replace('/\W\w+\s*(\W*)$/', '$1', $str1)."\n";  
?> 

<?php
$pattern = '/[^\w]fox\s/';
if (preg_match($pattern, 'The quick brown fox jumps over the lazy dog'))
  {
  echo "'fox' is present..."."\n";
  }
  else
  echo "'fox' is not present..."."\n";
?>