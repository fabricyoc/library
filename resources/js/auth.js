if (document.querySelector("#verPassword")) {
    document.querySelector('#verPassword').addEventListener('mousedown', function() {
        if (document.querySelector('#password').type == 'password') {
            document.querySelector('#password').type = 'text';

            document.querySelector("#verPassword").classList.remove('fa-eye');
            document.querySelector("#verPassword").classList.add('fa-eye-slash');
        }
        else {
            document.querySelector('#password').type = 'password';

            document.querySelector("#verPassword").classList.add('fa-eye');
            document.querySelector("#verPassword").classList.remove('fa-eye-slash');
        }
    });
}
