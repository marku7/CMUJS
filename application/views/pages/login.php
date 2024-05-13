<link rel="stylesheet" href="assets/css/login.css">
<div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
        <header>Login</header>
        <form id="loginForm" action="<?php echo base_url('auth/process_login'); ?>" method="post">
            <input type="text" name="email" placeholder="Enter your email">
            <input type="password" name="password" placeholder="Enter your password">
            <input type="submit" class="button" value="Login">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo "<p>Test debugging print</p>";
                }
            ?>
        </form>
        <div class="signup">
            <span class="signup">Don't have an account?
                <label for="check">Signup</label>
            </span>
        </div>
    </div>
    <div class="registration form">
        <header>Signup</header>
        <form action="<?php echo base_url('auth/process_login'); ?>" method="post">
            <input type="text" placeholder="Enter your email">
            <input type="password" placeholder="Create a password">
            <input type="password" placeholder="Confirm your password">
            <input type="button" class="button" value="Signup">
        </form>
        <div class="signup">
            <span class="signup">Already have an account?
                <label for="check">Login</label>
            </span>
        </div>
    </div>
</div>
