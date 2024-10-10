       <!--footer-->
       <div class="row footer pt-3">
        <div class="col-md-12">
          <p class="text-center" style="color: white"> &copy;Kitchen Companion <?php echo date('Y')?></p>
          <p class="text-center" style="font-size: x-small;">Developed by Chuks Ike</p>
        </div>
       </div>
       
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.umd.js"></script>
<script>
      $(function(){
            $("#email").change(function(){
              var data = $(this).val();
              $.get("process/validate_email.php",{"email":data}, function(resp){
               $('#email_feedback').html(resp);
               if(resp == "Email is in use please pick another one"){
                $('#btnregister').attr('disabled','disabled');
               }else{
                $('#btnregister').removeAttr('disabled');
               }
               

              });
            });
          });
    </script>
    <script>
      $(function(){
        $("#index-select").change(function(){
          let value = $(this).val();
            $("#recipe-cat").load("process/cat_load.php", {category: value});
          
        });
       
       $("#search-form").submit(function(event){
        event.preventDefault();
          let srch =  $("#index-input").val();
          if(srch != ""){
            $("#result").load("process/search_load.php", {search: srch});
          };
       });
       

        $("#bookmark").click(function(){
          var usid = $("#usid").val();
          var rpid =$("#rpid").val();
          if(usid !=""){
            $("#alert").load("process/bookmark_process.php",{userid:usid,recipeid:rpid});
          }else{
            alert("please login");
          }
          
        })


   
      })
      
    </script>
    <script>
        $(function(){
          $("#comment").submit(function(event){
        event.preventDefault();
          let comm =  $("#txt-comment").val();
          if(comm != ""){
            $("#response").load("process/comment_process.php", {comment: comm},function(resp){
              if(resp){
                location.reload();
              }
            });
            
          };
       });
        })
    </script>
<script>
    const {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph,
        List
    } = CKEDITOR;

    ClassicEditor
        .create( document.querySelector( '.editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph,List ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor','bulletedList', 'numberedList'
            ]
        })
        .then( /* ... */ )
        .catch( /* ... */ );
</script>
   
</body>
</html>