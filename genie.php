<html>
<head>
<title>LPGG+ Web BETA</title>

<link rel="icon" type="image/png" href="assets/images/genie.png">

<style>
input[readonly] {
    background-color: gainsboro;
}
input:required {
 }

input:required:invalid {
border-color: red;
padding-right: 20px; /* add a warning icon or message */
}

textarea {
  resize: none;
}
hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;
}
.container {
  position: relative;
  
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.image-container {
  width: 82px; /* adjust to your image size */
  height: 88px; /* adjust to your image size */
  background-image: url("<?php echo $_GET['2']; ?>"); /* initial image */
  transition: background-image 0.3s ease-in-out; /* smooth transition */
}
.leappad-1 {
  width: 82px; /* adjust to your image size */
  height: 88px; /* adjust to your image size */
  background-image: url("<?php echo $_GET['2']; ?>"); /* initial image */
  transition: background-image 0.3s ease-in-out; /* smooth transition */
}

.image-container:hover {
  background-image: url("<?php echo $_GET['3']; ?>"); /* rollover image */
}

</style>

</head>



<body>

<fieldset><legend>LeapPad Game Genie++ Web BETA</legend>

<table>

<tr>

<td align = "right" width="20%">

<fieldset>
<legend>Game Information</legend>


<form action="process.php" enctype="multipart/form-data" id="formMain">

<input type="hidden" id="1" name="1" value="<?php

session_start();

$gamefile1 = $_POST['1'];
echo '' . htmlspecialchars($_GET["1"]) . '';
?>">

<input type="hidden" id="2" name="2" value="<?php
$gamefile2 = $_POST['2'];
echo '' . htmlspecialchars($_GET["2"]) . '';
?>">

<input type="hidden" id="3" name="3" value="<?php
$gamefile3 = $_POST['3'];
echo '' . htmlspecialchars($_GET["3"]) . '';
?>">
<input type="hidden" style="width: 170px" id="GameID" name="GameID" value="DEAK-
<?php
$gameproductid = $_SESSION['ProductID'];
echo '' . htmlspecialchars($_GET["ProductID"]) . '';
?>-000000" form="formTAR" readonly>



<label for="MetaVersion">MetaVersion=<input type="text" id="MetaVersion" name="MetaVersion" value="1.0" style="width: 170px" readonly><br>

<label for="Device">Device=<select name="Device" id="Device" style="width: 170px">
  <option value="LeapPadExplorer" <?php if ($_POST['Device'] == 'LeapPadExplorer') echo ' selected="selected"'; ?>>LeapPadExplorer</option>
  <option value="LeapPad2Explorer" <?php if ($_POST['Device'] == 'LeapPad2Explorer') echo ' selected="selected"'; ?>>LeapPad2Explorer</option>
  <option value="LeapPad3" <?php if ($_POST['Device'] == 'LeapPad3') echo ' selected="selected"'; ?>>LeapPad3</option>
  <option value="LeapPadUltra" <?php if ($_POST['Device'] == 'LeapPadUltra') echo ' selected="selected"'; ?>>LeapPadUltra</option>
  <option value="LeapsterExplorer" <?php if ($_POST['Device'] == 'LeapsterExplorer') echo ' selected="selected"'; ?>>LeapsterExplorer</option> 
<option value="LeapsterGSExplorer" <?php if ($_POST['Device'] == 'LeapsterGSExplorer') echo ' selected="selected"'; ?>>LeapsterGSExplorer</option> 
</select><br>

<label for="Type">Type=<input type="text" style="width: 170px" id="Type" name="Type" value="Application" readonly><br>

<label for="ProductID">ProductID=<input type="text" style="width: 170px" id="ProductID" maxlength="10" name="ProductID" value="
<?php
$gameproductid = $_SESSION['ProductID'];
echo '' . htmlspecialchars($_GET["ProductID"]) . '';
?>
"onchange="checkFilled();" required><br>


<label for="PackageID">PackageID=<input type="text" style="width: 170px" id="PackageID" name="PackageID" value="DEAK-
<?php
$gameproductid = $_SESSION['ProductID'];
echo '' . htmlspecialchars($_GET["ProductID"]) . '';
?>-000000" readonly><br>

<label for="Version">Version=<input type="text" style="width: 170px" id="Version" name="Version" value="1.0.0" alt="Default: 1.0.0"><br>

<label for="Locale">Locale=<input type="text" style="width: 170px" id="Locale" name="Locale" value="en-us" readonly><br>

<label for="Name">Name=<input type="text" style="width: 170px" id="Name" name="Name" value="<?php
$gamename = $_POST['Name'];
echo '' . htmlspecialchars($_GET["Name"]) . '';
?>" onchange="checkFilled();"><br>
<label for="Publisher">Publisher=<input type="text" style="width: 170px" id="Publisher" name="Publisher" value="<?php
$gameppublisher = $_POST['Publisher'];
echo '' . htmlspecialchars($_GET["Publisher"]) . '';
?>"onchange="checkFilled();"><br>
<label for="Developer">Developer=<input type="text" style="width: 170px" id="Developer" name="Developer" value="<?php
$gamedeveloper = $_POST['Developer'];
echo '' . htmlspecialchars($_GET["Developer"]) . '';
?>" onchange="checkFilled();"><br>
<label for="Hidden">Hidden=<select name="Hidden" id="Hidden" style="width: 170px" alt="Default: 0">
  <option value="0">0</option>
  <option value="1">1</option>
  </select><br>
<label for="Icon">Icon=<input type="text" style="width: 170px" id="Icon" name="Icon" value="Icon_LPAD.png" readonly><br>
<label for="AppSo">AppSo=<input type="text" style="width: 170px" id="AppSo" name="AppSo" value="loader.swf" readonly><br>
<label for="DeviceAccess">DeviceAccess=<select name="DeviceAccess" id="DeviceAccess" style="width: 170px" alt="Default: 1">
  <option value="1">1</option>
  <option value="0">0</option>
  </select><br>
<label for="Category">Category=<select name="Category" id="Category" style="width: 170px">
  <option value="Game">Game</option>
  <option value="Creativity">Creativity</option>
  <option value="Utility">Utility</option>
  <option value="Video">Video</option>
 </select><br>
<label for="PreviewImage">PreviewImage=<input type="text" style="width: 170px" id="PreviewImage" name="PreviewImage" value="Preview.png" readonly><br>
<label for="Depends">Depends=<input type="text" style="width: 170px" id="Depends" name="Depends" value="LPAD-0x001E000F-000001" readonly><br>
<label for="ViewFrame">ViewFrame=<select name="ViewFrame" id="ViewFrame" style="width: 170px">
  <option value="None">None</option>
  <option value="PADS/rotate.json">Rotate D-Pad</option>
  <option value="PADS/1buttonMap.json">+1 Buttons</option>
  <option value="PADS/2buttonMap.json">+2 Buttons</option>
  <option value="PADS/4buttonMap.json">+4 Buttons</option> 
</select><br>
  <input type="submit" value="preview" name="preview">
  </form>
  <br><br>
  
</fieldset>
</td>


<td align="center" width="40%">
<fieldset><legend>Add Your Files</legend>
<table>
<tr>

			<td align="right"><br>
        <form method="post" enctype="multipart/form-data" action="upload.php" id="formFiles">
            Game.swf: <input type="file" name="swfToUpload" id="swfToUpload" size="35" accept=".swf" value="SWF File"><br>
			<br>Icon.png: <input type="file" name="iconToUpload" id="iconToUpload" size="35" accept=".png" value="Icon Image"><br>
            <br>Preview.png: <input type="file" name="previewToUpload" id="previewToUpload" size="35" accept=".png" value="Preview Image"><br>
            </td>
			<td align="left"><div class="container">
  <div class="center">
    <input type="submit" value="upload" name="upload">
</form>
</div>
</div>
			
	
			</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
<?php   if(isset($_GET['2'])){?>
<div class="image-container">
		  </div>
<?php   } ?></td>
			

			
			

</tr>
</table><?php

$swf = $_POST['1'];

echo '<script src="https://happygamer1450.github.io/Ruffle-Embedded/ruffle/ruffle.js"></script>
<div class="swf" dir="ltr" style="text-align: center;" trbidi="on">
        <embed id ="flash-player" height="272" pluginspage=" http://www.macromedia.com/go/getflashplayer" src="https://genie.epizy.com/' . htmlspecialchars($_GET["1"]) . '" type="application/x-shockwave-flash" width="480"></embed>
</div>
';
?>
<br><br>
</fieldset>
</td>

<td width="30%">
<fieldset>
<legend>GameInfo.json</legend>
<center>
<textarea id="gameinfo-json" name="gameinfo-json" rows="6" cols="50" form="None"><?php 
$gameicon = $_POST['Icon'];
$gamelabel = $_POST['Name'];
$gameviewframe = $_POST['ViewFrame'];
$gamepackageid = $_POST['PackageID'];

echo '{
	"IconPHRS":"' . htmlspecialchars($_GET["Icon"]) . '",
	"IconLabel":"' . htmlspecialchars($_GET["Name"]) . '",
	"ViewFrame":"' . htmlspecialchars($_GET["ViewFrame"]) . '"
}
';
?>
</textarea></center>
</fieldset>
<center><br>
<form action="/process.php" id="formTAR"><input type="submit" Value="generate" name="generate">
</form>
</center>
 <fieldset><legend>Meta.inf</legend><center>
<textarea id="meta-inf" name="meta-inf" rows="18" cols="50" form="None"><?php 
$gamemetaversion = $_POST['MetaVersion'];
$gamedevice = $_POST['Device'];
$gametype = $_POST['Type'];
$gameproductid = $_POST['ProductID'];
$gamepackageid = "DEAK-".$_POST['ProductID']."-000000";
$gameversion = $_POST['Version'];
$gamelocale = $_POST['Locale'];
$gamename = $_POST['Name'];
$gamepublisher = $_POST['Publisher'];
$gamedeveloper = $_POST['Developer'];
$gamehidden = $_POST['Hidden'];
$gameicon = $_POST['Icon'];
$gameappso = $_POST['AppSo'];
$gamedeviceaccess = $_POST['DeviceAccess'];
$gamecategory = $_POST['Category'];
$gamepreviewimage = $_POST['PreviewImage'];
$gamedepends = $_POST['Depends'];


echo 'MetaVersion="' . htmlspecialchars($_GET["MetaVersion"]) . '"
Device="' . htmlspecialchars($_GET["Device"]) . '"
Type="' . htmlspecialchars($_GET["Type"]) . '"
ProductID=' . htmlspecialchars($_GET["ProductID"]) . '
PackageID="' . htmlspecialchars($_GET["PackageID"]) . '"
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
?></textarea></center>
<script>
function checkFilled() {
    var inputVal = document.getElementById("ProductID");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "yellow";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
	var inputVal = document.getElementById("Name");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "yellow";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
	var inputVal = document.getElementById("Publisher");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "yellow";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
	var inputVal = document.getElementById("Developer");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "yellow";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
	
}

checkFilled();

function validateForm() {
  const form = document.getElementById('formMain');
  const ProductIDField = document.getElementById('ProductID');
 
  if (ProductIDField.value === '') {
    alert('Please fill out all required fields!');
    return false; // prevent form submission
  }
  return true; // allow form submission
}

document.getElementById('formMain').addEventListener('submit', validateForm);

</script>
</fieldset>
</td>
</tr>
</table>
</fieldset>
<fieldset>
<legend>Usage:</legend>
<ol>
<li>Add your chosen SWF, Icon and <!--(Optional)-->Preview files.</li>
<ul>
<li>Your SWF will be shown resized, to demonstrate it scaled for the leappad's display.</li>
<li>Your Icon will be displayed, roll your mouse over the Icon image to display your Preview image.</li>
</ul>
<li>Configure Game Information</li>
<ul>
<li>Once you have entered your desired game information, you will see full previews of both files, check they look OK before generating the TAR!</li>
</ul>
<br>
<li>Repack the downloaded tar (with GNU compression or it WILL fail to install) then install it with LeapPad Manager.</li>
</ol>
</fieldset>


<fieldset>
<legend>Icon Sizes:</legend>
<br>Please use Icons that are suited for your device.
<br>
<table>
<br>
<tr>
<td>
<br>
<ul>
<li>LeadPad 1, 2 & 3</li>
<ul>
<li>Icon Size: 82*88px</li>
<li>Bubble Area:</li>
</ul>
</ul>
</td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><div class="leappad-1">
<img src="images/LPAD_Icon-Overlay.png">
</div>
</td>
<td>
<!--put LeapPadUltra stuff here-->
</td>
</tr>
</table>
</fieldset>


<fieldset>
<legend>To-Do List</legend>
<ul>
<li>Immediate Future</li>
<ol>

<li><b>Code to correctly TAR the files and start the download.(80%) IDK how to make a GNU tar in PHP, if you do, please show me!</b></li>
<li><i>Fix the Textboxes/Options not filling back in from $_POST</i></li>
<li>Form validation for the Generate TAR button- Why would I want to send null values?</li>
<li><s>Convert some of the Textboxes to Dropdowns if the options are limited and I know ANY of them.</s>(Done!)(I can add more options later if I find them.)
<li><s>Using the tabs backwards produces some weird %0D%0A results</s>(Done!)(Keep those &quot;&lt;?php&gt;&quot; free from line feed + carriage returns.)</li>
<li><s>Code to create the temp/meta.inf and temp/GameInfo.json files.</s> (Done!)</li>
</ol>

<li>Dreamland Plans</li>
<ol>

<li>Generate/Upload the game files into their own folder (DEAK-0x.......) Not difficult but me rewriting it will likely break everything until it works.</li>
<li>Keep track of the next unused GameID(I don't know how, maybe SQL?,php ScanDir?) and autofill the ProductID/PackageID's.</li>
<li>Automatically post the newly packaged game to the forum?</li>
<li>Detect Icon Size(pixels not filesize) and offer Device based correction/warning?</li>
</ol>
</ul>
</fieldset>
</body>
</html>