const dropDownInfo = document.querySelector(".dropdown-info-sheet-tournament");
const infoGeneral = document.querySelector(".container-info-description")

const dropDownStructure = document.querySelector(".dropdown-structure-tournament");
const structureTournament = document.querySelector(".structure-tournament")

dropDownInfo.addEventListener('click', () => {
    infoGeneral.classList.toggle('active-sheet-tournament')
    
})
dropDownStructure.addEventListener('click', () => {
    structureTournament.classList.toggle('active-sheet-tournament')
    
})
