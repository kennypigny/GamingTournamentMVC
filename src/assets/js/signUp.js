// VERIFICATION GENERAL
const onlyLetterRegex = /^[\p{L}]+$/u;

const submit = document.getElementById("submit");

const firstname = document.getElementById("firstname");

const lastname = document.getElementById("lastname");

const nickName = document.getElementById("nickname");

const password = document.getElementById("password")

const confirmPassword = document.getElementById("confirmPassword")

const newEmail = document.getElementById("email");

const letterErrorFirstname = document.querySelector(".letter-error-firstname");

const letterErrorSecondname = document.querySelector(
  ".letter-error-secondname"
);

const letterErrorNickname = document.querySelector(".letter-error-nickname");

function verificationOnlyLetter(inputTarget, errorText) {
  const value = inputTarget.value;

  if (onlyLetterRegex.test(value) || value == "") {
    errorText.classList.remove("message-error-visible");
  } else {
    errorText.classList.add("message-error-visible");

    // alert("TEST LETTRE VALIDE !");
  }
}

firstname.addEventListener("input", () =>
  verificationOnlyLetter(firstname, letterErrorFirstname)
);
lastname.addEventListener("input", () =>
  verificationOnlyLetter(lastname, letterErrorSecondname)
);


// VERIFICATION MDP




function verificationContentSpecialCharacter() {
  password.value;

  const passwordError = document.querySelector(".password-error");

  const verifyIfSpecialCharacterRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!verifyIfSpecialCharacterRegex.test(password)) {
    passwordError.classList.add("message-error-visible");
  } else {
    passwordError.classList.remove("message-error-visible");

    // alert("TEST MDP VALIDE !");
  }
}



function verifySamePassword() {
  password.value;

  confirmPassword.value;

  const passwordErrorConfirm = document.querySelector(
    ".password-error-confirm"
  );

  if (password !== confirmPassword) {
    passwordErrorConfirm.classList.add("message-error-visible");
  } else {
    passwordErrorConfirm.classList.remove("message-error-visible");

    // alert("TEST C'EST LE MEME MDP");
  }
}

submit.addEventListener(
  "click",
  verificationContentSpecialCharacter
);

submit.addEventListener("click", verifySamePassword);

//VERIFICATION EMAIL



function verifyNewEmail() {
  const verificationEmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;


  newEmail.value;
  const NewEmailError = document.querySelector(".email-error");

  if (!verificationEmailRegex.test(newEmail)) {
    NewEmailError.classList.add("message-error-visible");
  } else {
    NewEmailError.classList.remove("message-error-visible");

    // alert("EMAIL VALIDE !");
  }
}

newEmail.addEventListener("input", verifyNewEmail);

