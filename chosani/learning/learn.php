<?php
/*
  //location
  $point ="Hussein here";
  
  echo $point;


  // create the DOMDocument object, and load HTML from a string
  $dochtml = new DOMDocument();
  $dochtml->loadHTML($strhtml);

  // gets all DIVs
  $divs = $dochtml->getElementsByTagName('div');

  // traverse the object with all DIVs
  foreach($divs as $div) {
    // gets, and outputs the ID and content of each DIV
    $id = $div->getAttribute('id');
    $cnt = $div->nodeValue;

    echo $id. ' - '. $cnt. '<br/>';
  }
  $strhtml = '<!doctype html>
  <html>
  <head>
  <meta charset="utf-8" />
  <title>PHP getElementById, getElementsByTagName</title>
  </head>
  <body>
  <div id="cweb">https://coursesweb.net</div>
  <p>Free PHP Course</p>
  <div id="mp">marplo.net</div>
  </body></html>';
*/

//search what is in the array
//$_SESSION = $_POST();
echo "<pre>";
  //print_r($_SERVER) ;
echo "</pre>";

/*$allowed[] = 'post';
  $allowed[] = 'profile';
  $allowed[] = 'comment';

  if(in_array($_GET['type'], $allowed)){
*/
 $input = $_POST['word'];

$wardd = array("Mac", "NT", "Irix", "Linux");
$wards[] = $wardd;

//if(is_array(, $wards)) {
  //$os= array($wards); 
  if (in_array($input, $wards)) {
      echo "Got ". $input;
  }
  //else{
  //  echo "The word you entered don't exist in the databasa! Try another word.";
  //} 
  else{
    echo "Try again";
}

?>
<form action="" method="POST">
  <input type="text" name="word">
  <input type="submit" value="OK">
</form>