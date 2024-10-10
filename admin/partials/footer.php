       <!--footer-->
      <div class="row footer pt-3">
        <div class="col-md-12">
          <p class="text-center" style="color: white;"> &copy;Kitchen Companion <?php echo date('Y')?></p>
          <p class="text-center" style="font-size: x-small;">Developed by Chuks Ike</p>
        </div>
      </div>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      $(function(){
           $("#edit").click(()=>{
              $('.action').toggleClass("d-none");
           })
          });
    </script>
        <script>
        $(function(){
            $('input').click(function(){
                var value = $(this).val();
                var id =<?php echo $result['recipe_id']?>

              var res= confirm("do you want to "+value+"?");
               if(res== true){
                datatosend ={status:value,recipe_id:id}; 
                $.ajax({
                    url : "process/status_process.php",//where the request is sent to
                    type: "post",        //method of the request: post|get
                    dataType: "text",       //the type of data you are expecting from the server camel case dataType
                    data: datatosend,
                    success: function(response){       //if the request is succesfull
                    $('#response').html(response);
                    window.location.replace('admin_dashboard.php'); 
                    },
                    error: function(err){          //if there is error in the request
                        console.log(err);
                    }
                });
               }
            })
        })
    </script>
    <script>
      $(function(){
        $("#index-select").change(function(){
          let value = $(this).val();
          if(value != ""){
            $("#result").load("process/cat_load.php", {category: value});
          }
          
        });
       $("#search-form").submit(function(event){
        event.preventDefault();
          let srch =  $("#index-input").val();
          if(srch != ""){
            $("#result").load("process/search_load.php", {search: srch});
          }
          
       
       })

        $("#bookmark").click(function(){
          var usid = $("#usid").val();
          var rpid =$("#rpid").val();
          if(usid !=""){
            $("#alert").load("process/bookmark_process.php",{userid:usid,recipeid:rpid});
          }else{
            alert("please login");
          }
          
        })


        //comment ajax
        // $("#comment").submit(function(event){
        //         event.preventDefault();
        //     })
        //     $("#subcom").click(function(){
        //       var data = $('#comment');

        //         var datatosend = new FormData(data);
        //         $.ajax({
        //             url: "process/comment_process.php",
        //             dataType: "text",
        //             data: datatosend,
        //             type: "post",

        //             success: function(response){
        //               $('#rsvp').html(response);
        //             },

        //             error: function(err){

        //             }
        //         })
        //     })
      })
      

    </script>
</body>
</html>