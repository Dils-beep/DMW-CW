//predefined credentials
const credentials = {
    username: "admin",
    password: "12345"
};

function login() {
    const username = document.getElementById("username").value; //get username 
    const password = document.getElementById("password").value; //get password
    const errorDiv = document.getElementById("error"); //get error message

    // Clear previous errors
    errorDiv.textContent = "";

    // Check credentials
    if (username === credentials.username && password === credentials.password) {
        alert("Login successful!"); //if credentials are correct
        
        window.location.href = "plazaathenee/home.html"; //redirect user to home page
    } 
    else {
        //if credentials don't match show error message
        errorDiv.textContent = "Invalid username or password.";
    }
}
