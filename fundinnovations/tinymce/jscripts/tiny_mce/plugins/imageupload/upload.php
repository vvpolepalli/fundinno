<?php

if (isset($_FILES["image"]) && is_uploaded_file($_FILES["image"]["tmp_name"])) {

  //@todo Change base_dir!

  //$base_dir = 'C:/wamp/www';

  //$base_dir = 'http://182.72.141.134/estateace';

  // $base_dir = '/var/www/estateace';

  $base_dir = $_SERVER['DOCUMENT_ROOT'];

  //@todo Change image location and naming (if needed)

  $image = '/cms_images/' . $_FILES["image"]["name"];

   $imageToView = 'http://www.fundinnovations.com/cms_images/' . $_FILES["image"]["name"];

  if(move_uploaded_file($_FILES["image"]["tmp_name"], $base_dir . $image)) {

  	move_uploaded_file($_FILES["image"]["tmp_name"], $base_dir . $image);
 
	echo "Image Uploaded";

  }
 
  

?>

<input type="text" id="src" name="src" />

<script type="text/javascript" src="../../tiny_mce_popup.js"></script>

<script>

  var ImageDialog = {

    init : function(ed) {

      ed.execCommand('mceInsertContent', false, 

        tinyMCEPopup.editor.dom.createHTML('img', {

          src : '<?php echo $imageToView; ?>'

        })

      );

      

      tinyMCEPopup.editor.execCommand('mceRepaint');

      tinyMCEPopup.editor.focus();

      tinyMCEPopup.close();

    }

  };

  tinyMCEPopup.onInit.add(ImageDialog.init, ImageDialog);

</script>

<?php  } else {?>

<fieldset>

<legend>Upload Image</legend>

<table class="properties">

<tr><td >

<form name="iform" action="" method="post" enctype="multipart/form-data">

  <input id="file" accept="image/*" type="file" name="image" onchange="this.parentElement.submit()" />

</form>

</td>

</tr>

</table>

</fieldset>

<?php }?>