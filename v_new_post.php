


<br>
<br>



<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 text-center">
                <h1> New Blog Post </h1>
                <br>
                    <div class="info-form">
                    <form action="<?= base_url()?>starter/new_post_proc/" method="post" class="justify-content-center"  enctype='multipart/form-data'>
                            <div class="form-group">
                                <label class="sr-only">Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="post_title">
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Description</label>
                                <textarea class="form-control" placeholder="Describe it" name="post"></textarea>
                            </div>
                            <div class="row py-4">
        <div class="col-lg-6 mx-auto">

            <!-- Upload image input-->
 <!-- File Button --> 

 <div class="form-group">
  <input name="img_file[]" type="file" id="fileUpload" accept="image/x-png,image/gif,image/jpeg">
  </div>
  <p class="text-muted" style="text-align: center;">please use only below 1500 * 1500 pixel imgs.</p>

<br>
<br>

<p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="add" value="Upload" onclick="return Upload()" /></p>
                        </form>
                        </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
function Upload() {
    //Get reference of FileUpload.
    var fileUpload = document.getElementById("fileUpload");
 
    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
 
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height > 100 || width > 100) {
                        alert("Height and Width must not exceed 100px.");
                        return false;
                    }
                    alert("Uploaded image has valid Height and Width.");
                    return true;
                };
 
            }
        } else {
            alert("This browser does not support HTML5.");
            return false;
        }
    } else {
        alert("Please select a valid Image file.");
        return false;
    }
}
</script>

