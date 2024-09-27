<?php 
    use xet\Loc;

if (isset($_SESSION["userId"])) { ?>

    <!-- logOut button -->
    <form method="post" action="/form">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="currentUrl" value="<?php echo htmlspecialchars(URL); ?>">
        <button type="submit" name="submit-logout" aria-label="Log Out" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
        </button>
    </form>

<?php }else{ ?>
        
    <input type="radio" name="signuplogin-btn-grp" id="id-signup-btn" class="underlay-btn">
    <input type="radio" name="signuplogin-btn-grp" id="id-login-btn" class="underlay-btn">
    <input type="radio" name="signuplogin-btn-grp" id="id-signuplogin-close-btn" style="display:none;">
    
    <label for="id-signup-btn" aria-label="Sign Up" class="icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M360-120q-66 0-113-47t-47-113v-327q-35-13-57.5-43.5T120-720q0-50 35-85t85-35q50 0 85 35t35 85q0 39-22.5 69.5T280-607v327q0 33 23.5 56.5T360-200q33 0 56.5-23.5T440-280v-400q0-66 47-113t113-47q66 0 113 47t47 113v327q35 13 57.5 43.5T840-240q0 50-35 85t-85 35q-50 0-85-35t-35-85q0-39 22.5-70t57.5-43v-327q0-33-23.5-56.5T600-760q-33 0-56.5 23.5T520-680v400q0 66-47 113t-113 47ZM240-680q17 0 28.5-11.5T280-720q0-17-11.5-28.5T240-760q-17 0-28.5 11.5T200-720q0 17 11.5 28.5T240-680Zm480 480q17 0 28.5-11.5T760-240q0-17-11.5-28.5T720-280q-17 0-28.5 11.5T680-240q0 17 11.5 28.5T720-200ZM240-720Zm480 480Z"/></svg></label>
    <label for="id-login-btn" aria-label="Log In" class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg></label>
        
    <label for="id-signuplogin-close-btn" class="underlay"></label>


    <div class="signuplogin-wrap">
        <div class="signuplogin">
            <span class="signuplogin-brand">
                <a href="/#" rel="noopener noreferrer"><?php readfile(Loc::file('BRAND','brand')); ?></a>
            </span>
            
            <div class="login-wrap">

                <h3>Log in</h3>
                
                <form class="signuplogin-form" method="post" action="/form">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="currentUrl" value="<?php echo htmlspecialchars(URL); ?>">
                    
                    <div class="field-wrap">
                        <div class="label-wrap">
                            <p>Email</p>
                        </div>

                        <input type="text" name="login-id" id="login-email" autocomplete="email"  aria-label="Email Address" required placeholder="email or username">
                    </div>
                    
                    <div class="field-wrap">
                        <div class="label-wrap">
                            <p>Password</p><a href="">Forgot password?</a>
                        </div>

                        <input type="password" name="login-pass" id="login-pass" autocomplete="current-password" aria-label="Email Password" required placeholder="password">
                    </div>

                    <div >
                        <button type="submit" name="submit-login" class="submit-login-btn" tabindex="0" aria-label="Submit Login">Log In</button>
                        <div class="tosignuplogin">
                            <p>Don't have an account? <label for="id-signup-btn" aria-label="Sign Up">Sign up</label></p>
                        </div>
                    </div>
                </form>
    
            </div>
        
            
            <div class="signup-wrap">

                <h3>Sign up</h3>

                <form class="signuplogin-form" method="post" action="/form">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="currentUrl" value="<?php echo htmlspecialchars(URL); ?>">
                    
                    <div class="field-wrap">
                        <div class="label-wrap">
                            <p>Name</p>
                        </div>

                        <input type="text" name="user-name" id="user-name" autocomplete="username" aria-label="Name" required placeholder="navlin ohio">
                    </div>

                    <div class="field-wrap">
                        <div class="label-wrap"><p>Email</p></div>

                        <input type="email" name="signup-email" id="signup-email" autocomplete="new-email" aria-label="Email Address" required placeholder="navlin44@gmail.com">
                    </div>
                
                    <div class="field-wrap">
                        <div class="label-wrap">
                            <p>Password</p>
                        </div>
                        <input type="password" name="signup-pass" id="signup-pass" autocomplete="new-username" aria-label="Email Password" required placeholder="p455w0rd">
                    </div>

                    <div>
                        <button type="submit" name="submit-signup" class="submit-signup-btn" tabindex="0" aria-label="Submit Signup">Sign Up</button>
                        <div class="tosignuplogin">
                            <p>Already have an account? <label for="id-login-btn" aria-label="Log In">Log in</label></p>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

<?php } ?>