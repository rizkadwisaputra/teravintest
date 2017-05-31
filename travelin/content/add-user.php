        <div class="row">
            <div class="panel panel-primary panel-home">
              <div class="panel-heading">
                <h3 class="panel-title">List User</h3>
              </div>
              <form method="POST">
              <div class="panel-body">
                    <div class="form-group col-md-7">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="formnama" name="nama" maxlength="50">
                    </div>
                    <div class="form-group col-md-7">
                        <label>Email</label>
                        <input type="email" class="form-control" id="formemail" name="email" data-placement="top" data-trigger="focus" data-content="Harap cek kembali format email anda!">
                    </div>
                    <div class="form-group col-md-7">
                        <label>No Hp</label>
                        <input type="number" class="form-control" name="nohp" id="formnohp"  data-placement="top" data-trigger="focus" data-content="Harap cek kembali no hp anda!">
                    </div>
                    <div class="form-group col-md-7">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat[]" id="formalamat">
                    </div>
                    <div class="col-md-4" style="padding-left:0px;">
                        <br/>
                        <a href="javascript:void(0);" class="btn btn-success" id="add_button" style="margin-top:5px;">+</a>
                    </div>
                    <div class="field_wrapper">
                        
                    </div>
              </div>
              <div class="panel-footer">
                <button id="formbtn" name="save" class="btn btn-success btn-add">Save</button> 
                <a href="index.php" class="btn btn-warning btn-add">Cancel</a>
              </div>
              </form>
              <?php if (isset($_POST['save'])) {
                require_once 'class/ClassUser.php';
                $user->simpan_user($_POST['nama'],$_POST['email'],$_POST['nohp'],$_POST['alamat']);
                echo "<script>location='index.php';</script>";
              } ?>
            </div>
        </div>
        <script type="text/javascript">
        //validasi text
        function validateText(id){
            if ($('#'+id).val()== null || $('#'+id).val()== "") {
                var div = $('#'+id).closest('div');
                div.addClass("has-error has-feedback");
                $('#'+id).animateCss('shake');
                return false;
            }
            else{
                var div = $('#'+id).closest('div');
                div.removeClass("has-error has-feedback");
                return true;    
            }
        }
        //validasi email
        function validateEmail(email,id) {
          var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          var test = re.test(email);

          if (!test) {
            var div = $('#'+id).closest('div');
            div.addClass("has-error has-feedback");
            $('#'+id).animateCss('shake');
            $('#'+id).popover('show')
            return false;
          }else{
            var div = $('#'+id).closest('div');
            div.removeClass("has-error has-feedback");
            return true; 
          }
        }
        //validate number
        function validateNumber(id){
            var jumNum = $('#'+id).val();
            var jum = jumNum.length;
          if (jum < 10) {
            var div = $('#'+id).closest('div');
            div.addClass("has-error has-feedback");
            $('#'+id).animateCss('shake');
            $('#'+id).popover('show')
            return false;
          }else{
            var div = $('#'+id).closest('div');
            div.removeClass("has-error has-feedback");
            return true; 
          }
        }

        $(document).ready(function(){

            var maxField = 10; //Input fields increment limitation
            var addButton = $('#add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var x = 1; //Initial field counter is 1
            $(addButton).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(wrapper).append($('<div class="form-group col-md-7 par'+x+'"><input type="text" class="form-control" name="alamat[]" id="formalamat'+x+'"></div><div class="col-md-4 par'+x+'" style="padding-left:0px;"><button class="btn btn-danger remove_button">x</button></div>').hide().fadeIn(800));

                }
            });
            $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $('.par'+x).fadeOut("slow", function() {
                     $(this).remove(); //Remove field html
                  });
                x--; //Decrement field counter
            });
            $("#formbtn").click(function(){
                for (i = 2; i <= x; i++) {
                    if (!validateText('formalamat'+i)) {
                        $('#formalamat'+i).focus();
                        return false;
                    }
                };
                return true;
            });
                
        });
        $(document).ready(function(){
                $(".row").animateCss('fadeIn');
            });
        
        $(document).ready(function(){
            $("#formbtn").click(function(){
                var email = $("#formemail").val();
                if (!validateText('formnama')) {
                    $('#formnama').focus();
                    return false;
                }
                if (!validateText('formemail')) {
                    $('#formemail').focus();
                    return false;
                }
                if (!validateEmail(email,'formemail')) {
                    $('#formemail').focus();
                    return false;
                }
                if (!validateText('formnohp')) {
                    $('#formnohp').focus();
                    return false;
                }
                if (!validateNumber('formnohp')) {
                    $('#formnohp').focus();
                    return false;
                }
                if (!validateText('formalamat')) {
                    $('#formalamat').focus();
                    return false;
                }

                return true;
            });
        });
        </script>