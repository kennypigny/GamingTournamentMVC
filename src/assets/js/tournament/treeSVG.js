document.addEventListener("DOMContentLoaded", () => {
    const svg = document.querySelector(".tournament-lines");
    const rounds = document.querySelectorAll(".container-tree-tournament > div");
  
    // Réinitialisation du contenu SVG (evite de superposé si le contenu est exécuté plusieur fois)
    svg.innerHTML = "";
  
    rounds.forEach((round, index) => {
      if (index === rounds.length - 1) return; // Pas de connexions après le dernier round
  
      const currentCells = Array.from(round.children);
      const nextCells = Array.from(rounds[index + 1].children);
  
      for (let i = 0; i < currentCells.length; i += 2) {
        const cell1 = currentCells[i];
        const cell2 = currentCells[i + 1];
        const nextCell = nextCells[Math.floor(i / 2)];
  
        draw90DegreeLine(cell1, cell2, nextCell);
      }
    });
  
    function draw90DegreeLine(cell1, cell2, nextCell) {
      const containerTreeTournament = document.querySelector(".container-tree-tournament");
      const containerRect = containerTreeTournament.getBoundingClientRect();
  
      const rect1 = cell1.getBoundingClientRect();
      const rect2 = cell2.getBoundingClientRect();
      const rectNext = nextCell.getBoundingClientRect();
  
      // Calcul des positions absolues par rapport au conteneur
      const startX1 = rect1.right - containerRect.left;
      const startY1 = rect1.top + rect1.height / 2 - containerRect.top;
  
      const startX2 = rect2.right - containerRect.left;
      const startY2 = rect2.top + rect2.height / 2 - containerRect.top;
  
      const midX = (rect1.right + rectNext.left) / 2 - containerRect.left;
      const endX = rectNext.left - containerRect.left;
      const endY = rectNext.top + rectNext.height / 2 - containerRect.top;
  
      // Dessin des lignes avec des angles à 90°
      svg.innerHTML += `
        <!-- Lignes de cell1 -->
        <path d="M ${startX1} ${startY1} H ${midX} V ${endY} H ${endX}" stroke="white" fill="none" stroke-width="2" />
        <!-- Lignes de cell2 -->
        <path d="M ${startX2} ${startY2} H ${midX} V ${endY} H ${endX}" stroke="white" fill="none" stroke-width="2" />
      `;
    }
  });
  