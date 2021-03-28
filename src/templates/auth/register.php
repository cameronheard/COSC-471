<?php $title = "Register" ?>

<?php ob_start() ?>

<table>
    <tr>
        <td><label for="first_name">First Name:</label></td>
        <td><input id="first_name" name="first_name" required></td>
    </tr>
    <tr>
        <td><label for="last_name">Last Name:</label></td>
        <td><input id="last_name" name="last_name" required></td>
    </tr>
    <tr>
        <td><label for="password">Password:</label></td>
        <td><input id="password" name="password" type="password" required></td>
    </tr>
    <tr>
        <td><label for="confirm_password">Confirm Password:</label></td>
        <td><input id="confirm_password" name="confirm_password" type="password" required></td>
    </tr>
    <tr>
        <td><label for="email">Email:</label></td>
        <td><input id="email" name="email" type="email" required></td>
    </tr>
    <tr>
        <td><label for="phone_number">Phone Number:</label></td>
        <td><input id="phone_number" name="phone_number" type="tel" required></td>
    </tr>
    <tr>
        <td>Address:</td>
    </tr>
    <tr>
        <td><label for="street">Street Address:</label></td>
        <td><input id="street" name="street" required></td>
    </tr>
    <tr>
        <td><label for="apartment_number">APT #:</label></td>
        <td><input id="apartment_number" name="apartment_number" type="number"></td>
    </tr>
    <tr>
        <td><label for="city">City:</label></td>
        <td><input id="city" name="city" required></td>
    </tr>
    <tr>
        <td><label for="state/province">State / Province:</label></td>
        <td><input id="state/province" name="state/province" required></td>
    </tr>
    <tr>
        <td><label for="postal_code">Postal Code:</label></td>
        <td><input id="postal_code" type="number" maxlength="5" minlength="5" required></td>
    </tr>
</table>
<script>
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("confirm_password");

    function check_passwords() {
        if (passwordField.innerText !== confirmPasswordField.innerText) confirmPasswordField.setCustomValidity("Passwords do not match!") else confirmPasswordField.setCustomValidity()
    }
</script>

<?php $form = ob_get_clean() ?>

<?php include __DIR__ . '/auth.php' ?>
