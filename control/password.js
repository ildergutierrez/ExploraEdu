function RPassword() {
    var passwordInput = document.getElementById("exampleInputPassword1");
    var toggleImage = document.getElementById("toggleImage");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleImage.src = "../imagen/ver.png";

    } else {
        passwordInput.type = "password";
        toggleImage.src = "../imagen/ojo.png";

    }
}
