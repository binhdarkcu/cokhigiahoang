<script type="text/javascript">
    const UploadUrl = "<?php echo plugins_url().'/video-management/api/uploader.php';?>";
</script>
<div class="upload">

<!---728x90--->

     <!--container--> 
    <div class="container">
        <div class="upload-grids">
            <div class="upload-right">
                <div class="upload-file">
                    <div class="services-icon">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                        <input type="file" id="uploadfiles" value="Choose file..">
                    </div>
                </div>
                <div class="upload-info">
                    <h5 id="upload-filename">Select file to upload</h5>
<!--                    <span>or</span>
                    <p>Drag and drop files</p>-->
                </div>
                <div id="progress-wrp">
                    <div class="progress-bar"></div>
                    <div class="status">0%</div>
                </div>
                <div id="upload-video-info">
                    <label for="video-title">Video title</label>
                    <br/>
                    <input type="text" name="title" id="video-title" required/>
                    <br/>
                    <br/>
                    <label for="video-description">Video description</label>
                    <br/>
                    <textarea name="video-description" id="video-description" rows="4" required></textarea>
                </div>
                <div class="signin upload-video">
                    <a  id="uploadfile_btn" class="button-primary"/>Upload</a>
                </div>
                <div id="video-preview">
                    <image id="image-preview" src=""/>
                </div>
            </div>

<!---728x90--->


        </div>
    </div>
     <!--//container--> 
</div>