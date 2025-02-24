//CHANGEMENT DE PHOTO ET BANNIERE PROFIL

const photoProfil = document.getElementById("photo-profil");
const bannerProfil = document.getElementById("banner-profil");
const uploadPhoto = document.getElementById("upload-photo");
const uploadBanner = document.getElementById("upload-banner");

photoProfil.addEventListener("click", () => {
  uploadPhoto.click();
});

uploadPhoto.addEventListener("change", (event) => {
  const file = event.target.files[0];

  if (file) {
    const newPhoto = new FileReader();

    newPhoto.onload = (e) => (photoProfil.src = e.target.result);

    newPhoto.readAsDataURL(file);
  }
});

bannerProfil.addEventListener("click", () => {
  uploadBanner.click();
});

uploadBanner.addEventListener("change", (event) => {
  const file = event.target.files[0];
  
  if (file) {
    const newPhoto = new FileReader();
    
    newPhoto.onload = (e) => (bannerProfil.src = e.target.result);
    
    newPhoto.readAsDataURL(file);
  }
});

// DROPDOWN DES BOX DE LA PAGE
const iconDropdownProfil = document.querySelector(".dropdown-general-profil");
const boxGeneral = document.querySelector(".box-general");

const iconChangePassword = document.querySelector(".dropdown-change-password");
const boxChangePassword = document.querySelector(".box-change-password");

const iconChangeMail = document.querySelector(".dropdown-change-mail");
const boxChangeMail = document.querySelector(".box-change-mail");

const iconDelete = document.querySelector(".dropdown-delete-account");
const boxDelete = document.querySelector(".box-delete");



iconDropdownProfil.addEventListener("click", () => {
  boxGeneral.classList.toggle("hide-box");
});
iconChangePassword.addEventListener("click", () => {
  boxChangePassword.classList.toggle("hide-box");
});
iconChangeMail.addEventListener("click", () => {
  boxChangeMail.classList.toggle("hide-box");
});
iconDelete.addEventListener("click", () => {
  boxDelete.classList.toggle("hide-box");
});


// VERIFICATION GENERAL
const onlyLetterRegex = /^[\p{L}]+$/u;

const buttonGeneral = document.getElementById("button-general");

const firstName = document.getElementById("firstname-user");

const secondName = document.getElementById("secondname-user");
console.log(secondName);

const nickName = document.getElementById("nickname-user");

const letterErrorFirstname = document.querySelector(".letter-error-firstname");

const letterErrorSecondname = document.querySelector(
  ".letter-error-secondname"
);

const letterErrorNickname = document.querySelector(".letter-error-nickname");

function verificationOnlyLetter(inputGeneral, errorText) {
  const value = inputGeneral.value;

  if (!onlyLetterRegex.test(value)) {
    errorText.classList.add("message-error-visible");
  } else {
    errorText.classList.remove("message-error-visible");

    // alert("TEST LETTRE VALIDE !");
  }
}
buttonGeneral.addEventListener("click", () =>
  verificationOnlyLetter(firstName, letterErrorFirstname)
);
buttonGeneral.addEventListener("click", () =>
  verificationOnlyLetter(secondName, letterErrorSecondname)
);
buttonGeneral.addEventListener("click", () =>
  verificationOnlyLetter(nickName, letterErrorNickname)
);

// VERIFICATION CHANGEMENT DE MOT DE PASSE

const buttonChangePassword = document.getElementById("button-change-password");

function verificationContentSpecialCharacter() {
  const newPassword = document.getElementById("new-password").value;

  const passwordError = document.querySelector(".password-error");

  const verifyIfSpecialCharacterRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!verifyIfSpecialCharacterRegex.test(newPassword)) {
    passwordError.classList.add("message-error-visible");
  } else {
    passwordError.classList.remove("message-error-visible");

    // alert("TEST MDP VALIDE !");
  }
}

function verifySamePassword() {
  const password = document.getElementById("new-password").value;

  const confirmPassword = document.getElementById("verify-password").value;

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

buttonChangePassword.addEventListener(
  "click",
  verificationContentSpecialCharacter
);

buttonChangePassword.addEventListener("click", verifySamePassword);

// VERIFICATION CHANGEMENT D EMAIL

const buttonChangeMail = document.getElementById("button-change-mail");

function verifyNewEmail() {
  const verificationEmailRegex =
    /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const newEmail = document.getElementById("new-mail").value;
  const NewEmailError = document.querySelector(".new-email-error");

  if (!verificationEmailRegex.test(newEmail)) {
    NewEmailError.classList.add("message-error-visible");
  } else {
    NewEmailError.classList.remove("message-error-visible");

    // alert("EMAIL VALIDE !");
  }
}

buttonChangeMail.addEventListener("click", verifyNewEmail);
