<?php
function imageUpload($name,&$connect,&$statusMsg)
{
    $targetDir = "../Images/";
    $fileName = basename($_FILES[$name]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    //$statusMsg.=$_FILES[$name]["name"];
    if (!empty($_FILES[$name]["name"])) {
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $sql="INSERT into images (file_name, uploaded_on) VALUES ('" . $fileName . "', NOW());";
                $insert=mysqli_query($connect,$sql);
                if ($insert) {
                   return $fileName;
                } else {
                    $statusMsg .= "<br>File upload failed, please try again.";
                }
            } else {
                $statusMsg .= "<br>Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg .= '<br>Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    } else {
        $statusMsg .= '<br>Please select a file to upload.';
    }
}
 ?>