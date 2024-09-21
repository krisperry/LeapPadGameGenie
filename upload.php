<?php
//One day i want to return the POST back to sender :) 



        if(isset($_FILES["swfToUpload"])){
            $file = $_FILES['swfToUpload'];
			$destDirectory = $_POST["GameID2"];
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

                        $swfDestination = "genie/{$destDirectory}/loader.swf";
						//$_SESSION['1'] = "temp{$destDirectory}/loader.swf";
                        move_uploaded_file($fileTmpName, $swfDestination);
                    //    header("Location: server.php?uploadsuccess");
                        //Display image here <----------
header("Location:genie.php?1=$swfDestination&MetaVersion={$_GET["MetaVersion"]}&Device={$_GET["Device"]}&Type={$_GET["Type"]}&ProductID={$_GET["ProductID"]}&PackageID={$_GET["PackageID"]}&Version={$_GET["Version"]}&Locale={$_GET["Locale"]}&Name={$_GET["Name"]}&Publisher={$_GET["Publisher"]}&Developer={$_GET["Developer"]}&Hidden={$_GET["Hidden"]}&Icon={$_GET["Icon"]}&AppSo={$_GET["AppSo"]}&DeviceAccess={$_GET["DeviceAccess"]}&Category={$_GET["Category"]}&PreviewImage={$_GET["PreviewImage"]}&Depends={$_GET["Depends"]}&ViewFrame={$_GET["ViewFrame"]}");

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
			$destDirectory = $_POST["GameID2"];
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

                        $iconDestination = "genie/{$destDirectory}/Icon_LPAD.png";


                        move_uploaded_file($fileTmpName, $iconDestination);
                    //    header("Location: server.php?uploadsuccess");
                        //Display image here <----------
header("Location:genie.php?1=$swfDestination&2=$iconDestination&MetaVersion={$_GET["MetaVersion"]}&Device={$_GET["Device"]}&Type={$_GET["Type"]}&ProductID={$_GET["ProductID"]}&PackageID={$_GET["PackageID"]}&Version={$_GET["Version"]}&Locale={$_GET["Locale"]}&Name={$_GET["Name"]}&Publisher={$_GET["Publisher"]}&Developer={$_GET["Developer"]}&Hidden={$_GET["Hidden"]}&Icon={$_GET["Icon"]}&AppSo={$_GET["AppSo"]}&DeviceAccess={$_GET["DeviceAccess"]}&Category={$_GET["Category"]}&PreviewImage={$_GET["PreviewImage"]}&Depends={$_GET["Depends"]}&ViewFrame={$_GET["ViewFrame"]}");

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
			$destDirectory = $_POST["GameID2"];
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

                        $previewDestination = "genie/{$destDirectory}/Preview.png";


                        move_uploaded_file($fileTmpName, $previewDestination);
                    //    header("Location: server.php?uploadsuccess");
                        //Display image here <----------
header("Location:genie.php?1=$swfDestination&2=$iconDestination&3=$previewDestination&MetaVersion={$_GET["MetaVersion"]}&Device={$_GET["Device"]}&Type={$_GET["Type"]}&ProductID={$_GET["ProductID"]}&PackageID={$_GET["PackageID"]}&Version={$_GET["Version"]}&Locale={$_GET["Locale"]}&Name={$_GET["Name"]}&Publisher={$_GET["Publisher"]}&Developer={$_GET["Developer"]}&Hidden={$_GET["Hidden"]}&Icon={$_GET["Icon"]}&AppSo={$_GET["AppSo"]}&DeviceAccess={$_GET["DeviceAccess"]}&Category={$_GET["Category"]}&PreviewImage={$_GET["PreviewImage"]}&Depends={$_GET["Depends"]}&ViewFrame={$_GET["ViewFrame"]}");

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

    ?>