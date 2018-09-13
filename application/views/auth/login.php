<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="<?php echo base_url($css_dir. '/logo1.png'); ?>" alt="CoolAdmin">
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                            </div>
                            
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                           
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
