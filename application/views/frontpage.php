<script type="text/javascript">
$(document).ready(function(){
    $(function() {
  function split( val ) {
                return val.split( /,\s*/ );
        }
                function extractLast( term ) {
                 return split( term ).pop();
        }

        $( "#search" )
            // don't navigate away from the field on tab when selecting an item
              .bind( "keydown", function( event ) {
                if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).data( "autocomplete" ).menu.active ) {
                    event.preventDefault();
                }
            })
            .autocomplete({
                source: function( request, response ) {
                    $.getJSON( "<?php echo base_url();?>index.php/teacher/search",{  //Url of controller
                        term: extractLast( request.term )
                    },response );
                },
                search: function() {
                    // custom minLength
                    var term = extractLast( this.value );
                    if ( term.length < 1 ) {
                        return false;
                    }
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    var terms = split( this.value );
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    window.location.href = "<?php echo base_url();?>index.php/teacher/profile/" + ui.item.value;
                    //terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( "," );
                    return false;
                }
            });
          
 });
});
</script>
</script>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
            <form class="navbar-form navbar-right" role="search" method ="POST">
            <div class="form-group">
                <input type="text" class="form-control" name ="term" id="search" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
      </div>
    </div>

    <div class="container">

        <div id="login-wraper">
            <form class="form login-form" method ="POST" action ="<?php echo base_url() . "index.php/login/signin"; ?>">
                <legend>Sign in to <span class="blue">My Academia</span></legend>
            
                <div class="body">
                    <label>Username</label>
                    <input type="text" name ="email">
                    <br>
                    <label>Password</label>
                    <input type="password" name ="password">
                </div>
            
                <div class="footer">
                                
                    <button type="submit" class="btn btn-success pull-right">Login</button>
                </div>
            
            </form>
        </div>

    </div>

    <footer class="white navbar-fixed-bottom">
      Don't have an account yet? <a href="<?php echo base_url() ."index.php/teacher/form"; ?>" class="btn btn-black">Register</a>
    </footer>