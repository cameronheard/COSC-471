<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Store</title>

</head>
<body>
    <h1>Create Store</h1>
    <form action="/action_page.php">
        <label for="name">Name</label>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br>
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone"><br>
        <label for="logo">Insert Logo</label>
        <input type="file" id="logo" name="logo"><br>
        <label for="desc">Store Description</label>
        <textarea rows="4" cols="50" id="desc" name="desc"></textarea><br>
        <p>Address</p><br>
        <label for="street">Street Address</label>
        <input type="text" id="street" name="street"><br>
        <label for="apt">APT #</label>
        <input type="text" id="apt" name="apt">
        <label for="city">City</label>
        <input type="text" id="city" name="city"><br>
        <label for="state">State/Province</label>
        <input type="text" id="state" name="state"><br>
        <label for="country">Country</label>
        <input type="text" id="country" name="country">
        <label for="zip">Postal Code</label>
        <input type="text" id="zip" name="zip"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>