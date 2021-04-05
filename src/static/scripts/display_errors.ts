{
    const errors : Array<string> = JSON.parse((<HTMLScriptElement>document.getElementById("errors")).text);
    alert(["Error!"].concat(errors).join("\n"));
}
