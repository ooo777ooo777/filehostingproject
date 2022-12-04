<?php
// Checking if POST is used.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  exit('You have to use POST to upload files!');
}

// Checking if there is a file selected by the user.
if ($_FILES['uploaded_file']['error'] == 'UPLOAD_ERR_NO_FILE') {
  exit('You must upload something.');
}

// Variables.
$filepath = $_FILES['uploaded_file']['tmp_name'];
$fileSize = filesize($filepath);
$fileinfo = finfo_open(FILEINFO_MIME_TYPE);
$filetype = finfo_file($fileinfo, $filepath);

// Checking if file has some size.
if ($fileSize === 0) {
  exit('The size of your file is 0.');
}

// Describing allowed file extensions.
$allowedTypes = [
  'image/png' => 'png',
  'image/jpeg' => 'jpg',
  'text/plain' => 'txt'
];

// Checking if the file has an allowed extension.
if (!in_array($filetype, array_keys($allowedTypes))) {
  exit('Your file type is not allowed!');
}

// Instructions for copying file to correct directory.
$filename = $_FILES['uploaded_file']['name'];
$targetDirectory = __DIR__ . "/uploadedfiles"; 
$newFilepath = $targetDirectory . "/" . $filename;

// Error on copying.
if (!copy($filepath, $newFilepath)) {
  exit('Errors moving the file from temp to real directory!');
}
// Deleting temp file.
unlink($filepath); 

// Redirect to filelist.php, after upload.
header('Location: filelist.php');
	exit;
?>