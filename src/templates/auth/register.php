<?php $title = "Register" ?>

<?php ob_start() ?>

<table>
    <tr>
        <td><label for="first_name">First Name:</label></td>
        <td><input id="first_name" name="register[first_name]" required></td>
    </tr>
    <tr>
        <td><label for="last_name">Last Name:</label></td>
        <td><input id="last_name" name="register[last_name]" required></td>
    </tr>
    <tr>
        <td><label for="password">Password:</label></td>
        <td><input id="password" name="register[password][0]" type="password" required></td>
    </tr>
    <tr>
        <td><label for="confirm_password">Confirm Password:</label></td>
        <td><input id="confirm_password" name="register[password][1]" type="password" required></td>
    </tr>
    <tr>
        <td><label for="email">Email:</label></td>
        <td><input id="email" name="register[email]" type="email" required></td>
    </tr>
    <tr>
        <td><label for="phone_number">Phone Number:</label></td>
        <td><input id="phone_number" name="register[phone_number]" type="tel" required></td>
    </tr>
    <tr>
        <td>Address:</td>
    </tr>
    <tr>
        <td><label for="street">Street Address:</label></td>
        <td><input id="street" name="register[street]" required></td>
    </tr>
    <tr>
        <td><label for="apartment_number">APT #:</label></td>
        <td><input id="apartment_number" name="register[apartment_number]" type="number"></td>
    </tr>
    <tr>
        <td><label for="city">City:</label></td>
        <td><input id="city" name="register[city]" required></td>
    </tr>
    <tr>
        <td><label for="state">State / Province:</label></td>
        <td><input id="state" name="register[state]" required></td>
    </tr>
    <tr>
        <td><label for="country">Country:</label></td>
        <td><input id="country" name="register[country]"></td>
    </tr>
    <tr>
        <td><label for="postal_code">Postal Code:</label></td>
        <td><input id="postal_code" name="register[zip]" type="number" maxlength="5" minlength="5" required></td>
    </tr>
    <tr>
        <td>User Type:</td>
    </tr>
    <tr>
        <td><label><input name="register[type]" type="radio" value="customer" required> Customer</label></td>
        <td><label><input name="register[type]" type="radio" value="seller" required> Seller</label></td>
    </tr>
</table>
<script>
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("confirm_password");

    function check_passwords() {
        confirmPasswordField.setCustomValidity(passwordField.value === confirmPasswordField.value ? "" : "Passwords do not match!");
        confirmPasswordField.reportValidity();
    }

    passwordField.onchange = check_passwords;
    confirmPasswordField.onchange = check_passwords;
    confirmPasswordField.oninput = check_passwords;
</script>

<?php $form = ob_get_clean() ?>

<?php include __DIR__ . '/auth.php' ?>
