<?php 
if (isset($_SESSION["userId"])) { ?>

    <!-- logOut button -->
    <form class="" action="<?php echo htmlspecialchars($INC_URL['formctl']); ?>" method="post">
        <input type="hidden" name="currentUrl" value="<?php echo htmlspecialchars($currentUrl); ?>">
        <button type="submit" name="submit-logout" class="icon" aria-label="Log Out">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
        </button>
    </form>

<?php }else{ ?>
    
    <!-- logIn button -->
    <input type="checkbox" class="underlayCheckbox" id="signuplogin-btn">
    <label for="signuplogin-btn" class="underlay"></label>
    <label for="signuplogin-btn" class="button">
        <i class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
        </i>
    </label>

    <!-- LOGIN-widget -->
    <div class="signuplogin-wrap">
        <div class="signuplogin">

            <a class="signuplogin-brand" href="/#"><?php echo file_get_contents($BRAND['brand']); ?></a>
            
            <div class="login">

                <h3>Log in</h3>
                
                <form class="signuplogin-form" method="post" action="<?php echo htmlspecialchars($INC_URL['formctl']); ?>">
                    <input type="hidden" name="currentUrl" value="<?php echo htmlspecialchars($currentUrl); ?>">
                    
                    <div class="field-wrap">

                        <div class="label-wrap">
                            <p class="label">Email</p>
                        </div>

                        <input type="text" name="user-id" id="email" class="input" aria-label="Email Address" placeholder="Email or username">
                    </div>
                    
                    <div class="field-wrap">

                        <div class="label-wrap">
                            <p class="label">Password</p>
                            <a class="" href="">Forgot password?</a>
                        </div>

                        <input type="password" name="user-pass" id="password" class="input" aria-label="Email Password" placeholder="Password">
                    </div>

                    <div >
                        <button type="submit" name="submit-login" class="login-btn">Log In</button>
                        <div class="tosignuplogin">
                            <p>Don't have an account? <a href="">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        
            <div class="signup nodis">

                <h3>Log in</h3>

                <form class="signuplogin-form" method="post" action="<?php echo htmlspecialchars($INC_URL['formctl']); ?>">
                    <input type="hidden" name="currentUrl" value="<?php echo htmlspecialchars($currentUrl); ?>">
                    
                    <div class="field-wrap">

                        <div class="label-wrap">
                            <p class="label">Email</p>
                        </div>

                        <input type="text" name="user-id" id="email" class="input" aria-label="Email Address" placeholder="Email or username">
                    </div>
                    
                    <div class="field-wrap">

                        <div class="label-wrap">
                            <p class="label">Password</p>
                            <a class="" href="">Forgot password?</a>
                        </div>

                        <input type="password" name="user-pass" id="password" class="input" aria-label="Email Password" placeholder="Password">
                    </div>

                    <div >
                        <button type="submit" name="submit-login" class="login-btn">Log In</button>
                        <div class="tosignuplogin">
                            <p>Don't have an account? <a href="">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

<?php } ?>