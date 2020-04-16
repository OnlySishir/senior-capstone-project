


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
  <input name="main_img[]" type="file" accept="image/x-png,image/gif,image/jpeg">
  </div>
  <p class="text-muted" style="text-align: center;">Please use only below 1500 * 1500 pixel images.</p>

<br>
<br>

<p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="add" value="Publish" /></p>
                        </form>
                        </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
</section>


