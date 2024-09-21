
<?php

session_start();

//Lets split the operations by origin form
//You can do an else, but I prefer a separate statement
if($_GET["preview"]=="preview") {
  /////////////
  //User hit the Update/ Preview meta.inf &gameinfo.json button, handle accordingly
  /////////////

  //Get the ProductID and Form a PackageID
  $ProductID = $_POST['ProductID'];
  $PackageID = "DEAK-". htmlspecialchars($_GET["ProductID"]) ."-000000";
  
  //For when I try having a SESSION, sometime?
  $_SESSION["Directory"] = $PackageID;
  $_SESSION["ProductID"] = htmlspecialchars($_POST["ProductID"]);

  //Create Directory (/genie/[PackageID]) (WORKING)
  try {
    $phar = new PharData('genie/newdir.tar');
	$phar->extractTo("genie/{$PackageID}", null, true); // extract all files, and overwrite
} catch (Exception $e) {
    // IDK how to handle errors :P
}

  //Saving GameInfo.json (WORKING)
$infoWrite = '{
	"IconPHRS":"' . htmlspecialchars($_GET["Icon"]) . '",
	"IconLabel":"' . htmlspecialchars($_GET["Name"]) . '",
	"ViewFrame":"' . htmlspecialchars($_GET["ViewFrame"]) . '"
}';    
$myInfo = "genie/{$PackageID}/GameInfo.json";
if(isset($_POST['infoWrite']) && !empty($_POST['infoWrite'])) {
$infoWrite = $_POST['infoWrite'].PHP_EOL;
}
if($infoWrite) {
$fh = fopen($myInfo, 'w') or die("can't open info"); //Make sure you have permission
fwrite($fh, $infoWrite);
fclose($fh);
}
//end save GameInfo.json
  
  //Saving meta.inf (WORKING)
$metaWrite = 'MetaVersion="' . htmlspecialchars($_GET["MetaVersion"]) . '"
Device="' . htmlspecialchars($_GET["Device"]) . '"
Type="' . htmlspecialchars($_GET["Type"]) . '"
ProductID=' . htmlspecialchars($_GET["ProductID"]) . '
PackageID="DEAK-' . htmlspecialchars($_GET["ProductID"]) . '-000000"
Version="' . htmlspecialchars($_GET["Version"]) . '"
Locale="' . htmlspecialchars($_GET["Locale"]) . '"
Name="' . htmlspecialchars($_GET["Name"]) . '"
Publisher="' . htmlspecialchars($_GET["Publisher"]) . '"
Developer="' . htmlspecialchars($_GET["Developer"]) . '"
Hidden=' . htmlspecialchars($_GET["Hidden"]) . '
Icon="' . htmlspecialchars($_GET["Icon"]) . '"
AppSo="' . htmlspecialchars($_GET["AppSo"]) . '"
DeviceAccess=' . htmlspecialchars($_GET["DeviceAccess"]) . '
Category="' . htmlspecialchars($_GET["Category"]) . '"
PreviewImage="' . htmlspecialchars($_GET["PreviewImage"]) . '"
Depends="' . htmlspecialchars($_GET["Depends"]) . '","1.0.0.0"
';    
$myMeta = "genie/{$PackageID}/meta.inf";
if(isset($_POST['metaWrite']) && !empty($_POST['metaWrite'])) {
$metaWrite = $_POST['metaWrite'].PHP_EOL;
}
if($metaWrite) {
$fh = fopen($myMeta, 'w') or die("can't open meta"); //Make sure you have permission
fwrite($fh, $metaWrite);
fclose($fh);
}
//end save meta.inf

//Go Back
header("Location:genie.php?1=$swfDestination&2=$iconDestination&3=$previewDestination&MetaVersion={$_GET["MetaVersion"]}&Device={$_GET["Device"]}&Type={$_GET["Type"]}&ProductID={$_GET["ProductID"]}&PackageID={$PackageID}&Version={$_GET["Version"]}&Locale={$_GET["Locale"]}&Name={$_GET["Name"]}&Publisher={$_GET["Publisher"]}&Developer={$_GET["Developer"]}&Hidden={$_GET["Hidden"]}&Icon={$_GET["Icon"]}&AppSo={$_GET["AppSo"]}&DeviceAccess={$_GET["DeviceAccess"]}&Category={$_GET["Category"]}&PreviewImage={$_GET["PreviewImage"]}&Depends={$_GET["Depends"]}&ViewFrame={$_GET["ViewFrame"]}");
//(WORKING, but would like to form $....DestinationsFrom GET['1']['2']['3'] 
  
}



if($_GET["upload"]=="upload") {
  //////////
  //User hit the upload button, handle accordingly
  //////////
  
  $ProductID = $_POST['ProductID'];
  $PackageID = "DEAK-". htmlspecialchars($_GET["ProductID"]) ."-000000";
  //$_SESSION["Directory"] = $PackageID;
  //$_SESSION["ProductID"] = htmlspecialchars($_GET["ProductID"]);

  echo 'Uploading SWF to: '. $PackageID . ' failed.';
  
        if(isset($_FILES["swfToUpload"])){
            $file = $_FILES['swfToUpload'];
            $fileName = $_FILES["swfToUpload"]["name"];
            $fileTmpName = $_FILES["swfToUpload"]["tmp_name"];
            $fileSize = $_FILES["swfToUpload"]["size"];
            $fileError = $_FILES["swfToUpload"]["error"];
            $fileType = $_FILES["swfToUpload"]["type"];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('swf', 'swf', 'swf');

            if(in_array($fileActualExt, $allowed)){
                //Image code
                if($fileError === 0){
                    if($fileSize < 50000000){

                        $swfDestination = "genie/{$PackageID}/loader.swf";
						$_SESSION['1'] = "genie/{$PackageID}/loader.swf";
                        move_uploaded_file($fileTmpName, $swfDestination);
                    //    header("Location: server.php?uploadsuccess");
                        //Display image here <----------
header("Location:genie.php?1=$swfDestination&MetaVersion={$_GET["MetaVersion"]}&Device={$_GET["Device"]}&Type={$_GET["Type"]}&ProductID={$_GET["ProductID"]}&PackageID={$PackageID}&Version={$_GET["Version"]}&Locale={$_GET["Locale"]}&Name={$_GET["Name"]}&Publisher={$_GET["Publisher"]}&Developer={$_GET["Developer"]}&Hidden={$_GET["Hidden"]}&Icon={$_GET["Icon"]}&AppSo={$_GET["AppSo"]}&DeviceAccess={$_GET["DeviceAccess"]}&Category={$_GET["Category"]}&PreviewImage={$_GET["PreviewImage"]}&Depends={$_GET["Depends"]}&ViewFrame={$_GET["ViewFrame"]}");

                    }else{
                        echo "<br>Your SWF file is too big!";
                    }
                }else{
                    echo "<br>There was an error while uploading your SWF file!";
                }
            }else{

                if(isset($_FILES["swfToUpload"])){
                    $file = $_FILES["swfToUpload"]["name"];
                    echo "<br>SWF File: ".$file;
                }
            }

        }
		
		
		
if(isset($_FILES["iconToUpload"])){
            $file = $_FILES['iconToUpload'];

            $fileName = $_FILES["iconToUpload"]["name"];
            $fileTmpName = $_FILES["iconToUpload"]["tmp_name"];
            $fileSize = $_FILES["iconToUpload"]["size"];
            $fileError = $_FILES["iconToUpload"]["error"];
            $fileType = $_FILES["iconToUpload"]["type"];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('png', 'png', 'png');

            if(in_array($fileActualExt, $allowed)){
                //Image code
                if($fileError === 0){
                    if($fileSize < 500000){

                        $iconDestination = 'genie/{$_SESSION["Directory"]}/Icon_LPAD.png';


                        move_uploaded_file($fileTmpName, $iconDestination);
                    //    header("Location: server.php?uploadsuccess");
                        //Display image here <----------
header("Location:genie.php?1=$swfDestination&2=$iconDestination&MetaVersion={$_GET["MetaVersion"]}&Device={$_GET["Device"]}&Type={$_GET["Type"]}&ProductID={$_GET["ProductID"]}&PackageID={$PackageID}&Version={$_GET["Version"]}&Locale={$_GET["Locale"]}&Name={$_GET["Name"]}&Publisher={$_GET["Publisher"]}&Developer={$_GET["Developer"]}&Hidden={$_GET["Hidden"]}&Icon={$_GET["Icon"]}&AppSo={$_GET["AppSo"]}&DeviceAccess={$_GET["DeviceAccess"]}&Category={$_GET["Category"]}&PreviewImage={$_GET["PreviewImage"]}&Depends={$_GET["Depends"]}&ViewFrame={$_GET["ViewFrame"]}");

                    }else{
                        echo "<br>Your Icon file is too big!";
                    }
                }else{
                    echo "<br>There was an error while uploading your Icon file!";
                }
            }else{

                if(isset($_FILES["iconToUpload"])){
                    $file = $_FILES["iconToUpload"]["name"];
                    echo "<br>Icon Image: ".$file;
                }
            }

        }




        if(isset($_FILES["previewToUpload"])){
            $file = $_FILES['previewToUpload'];

            $fileName = $_FILES["previewToUpload"]["name"];
            $fileTmpName = $_FILES["previewToUpload"]["tmp_name"];
            $fileSize = $_FILES["previewToUpload"]["size"];
            $fileError = $_FILES["previewToUpload"]["error"];
            $fileType = $_FILES["previewToUpload"]["type"];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($fileActualExt, $allowed)){
                //Image code
                if($fileError === 0){
                    if($fileSize < 500000){

                        $previewDestination = 'genie/{$_SESSION["Directory"]}/Preview.png';


                        move_uploaded_file($fileTmpName, $previewDestination);
                    //    header("Location: server.php?uploadsuccess");
                        //Display image here <----------
header("Location:genie.php?1=$swfDestination&2=$iconDestination&3=$previewDestination&MetaVersion={$_GET["MetaVersion"]}&Device={$_GET["Device"]}&Type={$_GET["Type"]}&ProductID={$_GET["ProductID"]}&PackageID={$PackageID}&Version={$_GET["Version"]}&Locale={$_GET["Locale"]}&Name={$_GET["Name"]}&Publisher={$_GET["Publisher"]}&Developer={$_GET["Developer"]}&Hidden={$_GET["Hidden"]}&Icon={$_GET["Icon"]}&AppSo={$_GET["AppSo"]}&DeviceAccess={$_GET["DeviceAccess"]}&Category={$_GET["Category"]}&PreviewImage={$_GET["PreviewImage"]}&Depends={$_GET["Depends"]}&ViewFrame={$_GET["ViewFrame"]}");

                    }else{
                        echo "<br>Your Preview file is too big!";
                    }
                }else{
                    echo "<br>There was an error while uploading your Preview file!";
                }
            }else{

                if(isset($_FILES["previewToUpload"])){
                    $file = $_FILES["previewToUpload"]["name"];
                    echo "<br>Preview Image: ".$file;
                }
            }

        }

}







//You can do an else, but I prefer a separate statement
if($_GET["generate"]=="generate") {
  //User hit the Generate TAR button, handle accordingly

 //this pattern works well at https://regex101.com/r/f5j5o4/3 but not here..
//22 Characters, ABC3-0xAB89EF12-123456
//$regex_pattern = '^(([A-Z0-9]{4})-0x([A-F0-9]{8})-([0-9]{6}))$/A';
$GameID = $_POST['GameID'];	
//	if (preg_match($regex_pattern, $GameID)) {

try {
	// assume GameID was posted from form


//name the output tar file
$phar = new PharData('genie/'. htmlspecialchars($_GET["GameID"]) . '.tar');
// add all the files from the TEMP directory
//Does work but makes a POSIX tar, we need it to be GNU
$phar->buildFromDirectory(dirname(__FILE__) . '/genie/'.htmlspecialchars($_SESSION["Directory"]));

//produces File.tar.gz doesn't work with LPM
//$phar->compress(Phar::COMPRESSED);

//i was trying a thing where i'd copy the blank GNU tar over and add the files to it?
// $phar->addFile('https://genie.epizy.com/temp', 'meta.inf');

// let's try zip
//$zip = new ZipArchive();
//$zip->open("genie/archive.tar", ZipArchive::CREATE);
//$zip->addFile("genie/{$_GET["PackageID"]}/loader.swf", "loader.swf");

//$zip->addEmptyDir("PADS");

//$zip->close();


    echo '' . htmlspecialchars($_GET["GameID"]) . ' Is Ready To Download!</h1>
	<br>
	<div class="content" id="download">
	<a href="genie/' . htmlspecialchars($_GET["GameID"]) . '.tar"><img src="https://genie.epizy.com/images/tar.png" alt="'. htmlspecialchars($_GET["GameID"]) . '.tar"></a>
    Download!</div>';
} 
catch (Exception $e) {
    // handle errors here
}
//}else{echo 'GameID: ' . htmlspecialchars($_GET["GameID"]) . ' didn&#39;t meet the naming convention.</h1><br>';}
 
  
}

    ?>

		
</div>
<div class="nk-gap-1"></div>
<div class="nk-gap-1"></div>
    <div class="footer">

        <div class="container" align="right">
            <a href="https://infinityfree.net"><img src="https://vpassets.infinityfree.net/welcome2017/logo.png" alt="InfinityFree" height="40px"></a><br>
			<b>Powered by a huge amount of Coffee &amp; Infinity Free hosting.</b>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</b>
</body>

</html>

