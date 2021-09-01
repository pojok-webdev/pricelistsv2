<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('login/head');?>
<body>
    
    <div class="loginBox">        
        <div class="loginHead">
            <img src="/asset/aqua/img/logo.png" alt="Login PadiNET" title="Login PadiNET"/>
        </div>
        <form class="form-horizontal" action="/main/authenticate" method="POST">            
            <div class="control-group">
                <label for="inputEmail">Email</label>                
                <input type="text" name="email" id="inputEmail"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" id="inputPassword"/>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Sign in</button>
            </div>
        </form>        
        
    </div>    
    
</body>
</html>
