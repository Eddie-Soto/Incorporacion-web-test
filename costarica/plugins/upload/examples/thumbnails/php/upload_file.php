<?php
    include('../../../src/class.fileuploader.php');
	
	// initialize FileUploader
    $FileUploader = new FileUploader('files-thumbs', array(
        'limit' => null,
        'maxSize' => null,
		'fileMaxSize' => null,
        'extensions' => ['png', 'jpg', 'pdf', 'doc', 'docx'],
        'required' => false,
        'uploadDir' => '../uploads/',
        'title' => 'name',
		'replace' => false,
        'listInput' => true,
        'files' => null
    ));
	
	// call to upload the files
    $data = $FileUploader->upload();
	
	// export to js
	echo json_encode($data);
	exit;