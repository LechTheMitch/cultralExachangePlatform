// const signUpButton=document.getElementById('signUpButton');
// const signInButton=document.getElementById('signInButton');
// const signInForm=document.getElementById('signIn');
// const signUpForm=document.getElementById('signup');

const roleElement = document.getElementById('role');
const skills = document.getElementById('skills');

roleElement.addEventListener('change', function() {
    const selectedRole = roleElement.value;
    if (selectedRole === 'Traveler') {
        skills.style.display = 'block';
    } else {
        skills.style.display = 'none';
    }
});
// <<<<<<< HEAD
// <<<<<<< HEAD

// =======
//
// >>>>>>> d20709c75ec9fddd697cfad75cc6e51e85a77281
// =======
// >>>>>>> 99f00ee4db1fa297a5d15a331bedd1153aff729f
// signUpButton.addEventListener('click',function(){
//     signInForm.style.display="none";
//     signUpForm.style.display="block";
// })
// signInButton.addEventListener('click', function(){
//     signInForm.style.display="block";
//     signUpForm.style.display="none";
// })