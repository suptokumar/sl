 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SKS FILE UPLOADER</title>  
           <script src="program/jquery.js"></script>  <meta name="viewport" content="width=device-width, initial-scale=1.0">

           <link rel="stylesheet" href="program/but.css" />  
           <script src="program/but.js"></script>  
           <style>  
           .file_drag_area  
           {  
                width:1100px;  
                height:400px;  
                border:2px dashed #ccc;  
                line-height:400px;  
                text-align:center;  
                font-size:24px;
           }  
           .file_drag_over{  
                color:#000;  
                border-color:#000;  
           }  
           </style>  
      </head>  
      <body>  
           <br />            
           <div class="container" style="width:1200px;" align="center">  
                <h3 class="text-center">File Uploader</h3>
                <input type="file" multiple id="ms" style="visibility: hidden;"> 
                <label for="ms" style="cursor: pointer;">
                <div class="file_drag_area">  
                     Drop Files Here  
                </div>  
                </label>
                <div id="uploaded_file"></div>  
           </div>  
           <br />  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
  $("#ms").change(function(event) {
   var files_list = $('#ms').prop("files");
   var formData = new FormData();  
           var person = prompt("Please Enter Serial: ","");
           formData.append('person',person);
           //console.log(files_list);  
           for(var i=0; i<files_list.length; i++)  
           {  
                formData.append('file[]', files_list[i]);  
           }  
           //console.log(formData);  
           $.ajax({  
                url:"upload.php",  
                method:"POST",  
                data:formData,  
                contentType:false,  
                cache: false,  
                processData: false, 
                beforeSend:function()
                {
$('#uploaded_file').html('<div class="alert alert-primary" role="alert"> Uploading Files... </div>');
                },
                success:function(data){  
$('#uploaded_file').html('<div class="alert alert-success" role="alert"> Uploaded to '+person+' : '+data+' </div>');
                }  
           })  

  });
      $('.file_drag_area').on('dragover', function(){  
           $(this).addClass('file_drag_over');  
           return false;  
      });  
      $('.file_drag_area').on('dragleave', function(){  
           $(this).removeClass('file_drag_over');  
           return false;  
      });  
      $('.file_drag_area').on('drop', function(e){  
           e.preventDefault();  
           $(this).removeClass('file_drag_over');  
           var formData = new FormData();  
           var files_list = e.originalEvent.dataTransfer.files;
           var person = prompt("Please Enter Serial: ","");
           formData.append('person',person);
           //console.log(files_list);  
           for(var i=0; i<files_list.length; i++)  
           {  
                formData.append('file[]', files_list[i]);  
           }  
           //console.log(formData);  
           $.ajax({  
                url:"upload.php",  
                method:"POST",  
                data:formData,  
                contentType:false,  
                cache: false,  
                processData: false,  
                beforeSend:function()
                {
$('#uploaded_file').html('<div class="alert alert-primary" role="alert"> Uploading Files... </div>');
                },
                success:function(data){  
$('#uploaded_file').html('<div class="alert alert-success" role="alert"> Uploaded to '+person+' : '+data+' </div>');
                }   
           })  
      });  
 });  
 </script> 
 <h3 class="text-center">My Files</h3>
 <div class="container">
 <input type="text" id="search" onkeyup="search(this.value)" placeholder="search folder" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
 </div>
   <br>   <style>
     .col {
      width: 150px;
      height: 140px;
      background: #00CEE0;
      padding: 10px;
      text-align: center;
      font-size: 20px;
      color: black;
      font-family: arial;
      display: inline-block;
      border-radius: 10px;
      cursor: pointer;
      transition: .2s;
     }
     .col:hover {
      background: #02B9C0;
      color: black;
     }
   </style>
   <script>
     function sopen(id){
$.ajax({
         url: 'scan.php',
         type: 'GET',
         data: "search="+id,
         beforeSend:function(){
$("#cd").html("Loading...");
         },
       success:function(data) {
         $("#cd").html(data);
       }
       });
     }
     $(document).ready(function() {

       search("");
       
     });
     function search(search)
     {
      $.ajax({
         url: 'folder.php',
         type: 'GET',
         data: "search="+search,
         beforeSend:function(){
$("#cd").html("Loading...");
         },
       success:function(data) {
         $("#cd").html(data);
       }
       });
     }
   </script>
 <div class="container" id="cd">


 </div>