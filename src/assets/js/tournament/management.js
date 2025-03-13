// MENU DROPDOWN MOBILE
const dropDownInfo = document.querySelector(".dropdown-info-sheet-tournament");
const infoGeneral = document.querySelector(".container-info-description");

const dropDownPlayers = document.querySelector(".dropdown-players-tournament");
const players = document.querySelector(".container-players");

const dropDownRegistration = document.querySelector(
  ".dropdown-registration-tournament"
);
const registration = document.querySelector(".container-registration");

dropDownInfo.addEventListener("click", () => {
  infoGeneral.classList.toggle("active-tournament-management");
});

dropDownPlayers.addEventListener("click", () => {
  players.classList.toggle("active-tournament-management");
});

dropDownRegistration.addEventListener("click", () => {
  registration.classList.toggle("active-tournament-management");
});

// AUTO-SELECT-RADIO auto-accept box-registration
document.getElementById("auto-accept-yes").checked = true;

// ADD JOUEUR MANUEL AU TOURNOIS
const addButton = document.getElementById("add-player");
const tbody = document.querySelector(".table-players tbody");


addButton.addEventListener("click", () => {
  const playerCount = tbody.querySelectorAll("tr").length + 1;

  const newRowTable = document.createElement("tr");

  // Ajout de la nouvelle ligne sur le tableaux
  newRowTable.innerHTML = `
        <td>
            <label for="list-player${playerCount}" aria-label="Joueur inscrit">
                <input type="checkbox" name="list-player${playerCount}" id="list-player${playerCount}" />
            </label>
        </td>
        <td data-type="nickname">Joueur ${playerCount}</td>
        <td>
            <img src="../assets/img/General/crayon.png" alt="Icone modifier" />
        </td>
    `;

  tbody.appendChild(newRowTable);
});


// MODIFICATION DU PSEUDO DE LA LISTE DES JOUEURS INSCRIT

tbody.addEventListener("click", function modificationOfNickname(event) {
  
  if (event.target.tagName === "IMG" || event.target.dataset.type === "nickname") {
    
    const rowParent = event.target.closest("tr"); 
    const nicknameCell = rowParent.querySelector("td:nth-child(2)");

    closeEditNicknameWindows();

    const currentNickname = nicknameCell.textContent.trim();

    nicknameCell.innerHTML = `
      <input type="text" value="${currentNickname}" class="edit-nickname" />
      <button class="save-btn">Add</button>
    `;

    

    // Selectionne les nouveaux élements
    const inputEdit = nicknameCell.querySelector(".edit-nickname");
    const saveButton = nicknameCell.querySelector(".save-btn");
    inputEdit.focus();

    const saveEdition = () => {
      const newName = inputEdit.value.trim();
      if (newName) {
        nicknameCell.textContent = newName;
      } else {
        alert("Veuillez ajoutez un pseudo !");
      }
    };

    saveButton.addEventListener("click", saveEdition);
    inputEdit.addEventListener("keypress", (push) => {
      if (push.key === "Enter") {
        saveEdition();
      }
    });
  }
});

// Fonction pour fermer les fenetres d'édition quand une autre s'ouvre
function closeEditNicknameWindows() {
  const openInputs = tbody.querySelectorAll(".edit-nickname");
  
  openInputs.forEach((input) => {
    const parentCell = input.closest("td");
    const currentName = input.value.trim();
    parentCell.textContent = currentName;
  });
}

// Supprimer des joueurs du tournoi

const deleteIcon = document.querySelector(".table-players tfoot img");

deleteIcon.addEventListener("click", function deletePlayers()  {

  const checkboxes = tbody.querySelectorAll("input[type='checkbox']:checked"); 

  checkboxes.forEach((checkbox) => {
    const playersToDelete = checkbox.closest("tr"); 
    playersToDelete.remove(); 
  });
});


// MODIFIER LE SCORE DES EQUIPES

document.addEventListener("DOMContentLoaded", () => {
  const tournamentCells = document.querySelectorAll(".cell-tournament");

  tournamentCells.forEach((cell) => {
    cell.addEventListener("click", () => {
      const resultSpan = cell.querySelector(".cell-result");

      
      if (cell.querySelector("input")) return;

      
      const currentScore = resultSpan.textContent.trim();

      
      const input = document.createElement("input");
      input.value = currentScore;
      input.style.width = "100%";
      input.style.height = "100%";
      input.style.textAlign = "center";

      
      resultSpan.textContent = ""; 
      resultSpan.appendChild(input);

      input.focus();
      
      const saveScore = () => {
        const newScore = input.value.trim() || "0"; 
        resultSpan.textContent = newScore; 
      };

      input.addEventListener("blur", saveScore);
      input.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
          saveScore();
        }
      });
    });
  });
});