{
    var errors = JSON.parse(document.getElementById("errors").text);
    alert(["Error!"].concat(errors).join("\n"));
}
