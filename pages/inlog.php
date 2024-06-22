<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky-High Inloggen</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <div class="inlog-header">
        <h1 class="logo">Sky-High</h1>
    </div>
    <div class="form-container">
        <a id="go-back" href="../index.php">Go back</a>
        <div class="form-header">
            <h2 id="form-title">Log in</h2>
        </div>
        <form class="form-input" id="login-form" action="login_logic.php" method="post">
            <div class="form-group">
                <label for="username">Username <span title="This field is required" class="requirelogo">*</span></label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password <span title="This field is required" class="requirelogo">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="error">
                <p id="perror" class="para-error"></p>
            </div>
            <div class="form-group">
                <input type="submit" value="Inloggen">
            </div>
            <div class="toggle-form">
                <a href="#" id="register-link">Don't have an account? Register here!</a>
            </div>
        </form>

    </div>

    <script>
        const loginForm = document.getElementById('login-form');
        const registerLink = document.getElementById('register-link');
        const formTitle = document.getElementById('form-title');

        registerLink.addEventListener('click', (e) => {
            e.preventDefault();
            const newForm = document.createElement('form');
            newForm.action = "register_logic.php";
            newForm.method = "post";
            newForm.classList.add("form-input");
            newForm.innerHTML = `
    <div class="form-group">
      <label for="username">Username <span title="This field is required" class="requirelogo">*</span></label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="email">E-mail <span title="This field is required" class="requirelogo">*</span></label>
      <input class="email-input" type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password <span title="This field is required" class="requirelogo">*</span></label>
      <input type="password" id="password" name="password" required>
    
    </div>
    <div class="form-group">
      <label for="confirm-password">Confirm Password <span title="This field is required" class="requirelogo">*</span></label>
      <input type="password" id="confirm-password" name="confirm-password" required>
      <span class="see-password" id="see-confirm-password">See Password</span>
    </div>
    <div class="error">
      <p id="perror" class="para-error">Passwords do not match</p>
    </div>
    <div class="form-group">
      <input type="submit" value="Register">
    </div>
    <div class="toggle-form">
      <a href="inlog.php" id="register-link">Already have an account? Log in!</a>
    </div>
  `;
            loginForm.parentNode.replaceChild(newForm, loginForm);
            formTitle.textContent = 'Register';
            const error = document.getElementById('perror');
            error.style.display = 'none';
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm-password');
            const seeConfirmPassword = document.getElementById('see-confirm-password');

            seeConfirmPassword.addEventListener('click', () => {
                if (confirmPasswordInput.type === 'password') {
                    passwordInput.type = 'text';
                    confirmPasswordInput.type = 'text';
                    seeConfirmPassword.textContent = 'Hide Password';
                } else {
                    confirmPasswordInput.type = 'password';
                    seeConfirmPassword.textContent = 'See Password';
                    passwordInput.type = 'password';

                }
            });

            confirmPasswordInput.addEventListener('input', () => {
                if (confirmPasswordInput.value == '') {
                    error.style.display = 'none';
                    console.log('Test Check')
                }
                if (confirmPasswordInput.value !== passwordInput.value) {
                    error.style.display = 'block';
                } else {
                    error.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>