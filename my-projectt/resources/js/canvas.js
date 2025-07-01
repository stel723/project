// Полифил для roundRect (если не поддерживается)
CanvasRenderingContext2D.prototype.roundRect = function(x, y, w, h, r) {
    if (w < 2 * r) r = w / 2;
    if (h < 2 * r) r = h / 2;
    this.beginPath();
    this.moveTo(x + r, y);
    this.arcTo(x + w, y, x + w, y + h, r);
    this.arcTo(x + w, y + h, x, y + h, r);
    this.arcTo(x, y + h, x, y, r);
    this.arcTo(x, y, x + w, y, r);
    this.closePath();
    return this;
};

document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    const cardImages = {};

    function preloadCards() {
        const suits = ['hearts', 'diamonds', 'clubs', 'spades'];
        suits.forEach(suit => {
            cardImages[suit] = new Image();
            cardImages[suit].src = `/images/${suit}.png`;
    });
    }
    // Базовая отрисовка карты
    function drawCard(x, y, width, height, rank, suit, isFaceUp = true) {
        ctx.save();
        
        // Рамка карты
        ctx.fillStyle = isFaceUp ? 'white' : '#1560bd'; // Синяя "рубашка"
        ctx.roundRect(x, y, width, height, 10);
        ctx.fill();
        ctx.stroke();

        if (isFaceUp) {
            // Цвет масти (красный/черный)
            ctx.fillStyle = ['hearts', 'diamonds'].includes(suit) ? 'red' : 'black';
            
            // Текст карты
            ctx.font = `${width/5}px Arial`;
            ctx.fillText(`${rank}${getSuitSymbol(suit)}`, x + 10, y + 25);
        }
        // В canvas.js
        if (typeof gameData !== 'undefined') {
            gameData.forEach(card => {
            drawCard(card.x, card.y, 100, 150, card.rank, card.suit);
        });
}
        ctx.restore();
    }

    function getSuitSymbol(suit) {
        const symbols = { 
            hearts: '♥', 
            diamonds: '♦', 
            clubs: '♣', 
            spades: '♠' 
        };
        return symbols[suit] || '';
    }

    function animateCard(card, targetX, targetY) {
    const dx = (targetX - card.x) / 20;
    const dy = (targetY - card.y) / 20;
    
    const animation = setInterval(() => {
        card.x += dx;
        card.y += dy;
        
        if (Math.abs(card.x - targetX) < 1) {
            clearInterval(animation);
        }
        redrawGame();
    }, 16);
}

    // Пример: отрисовка тестовой карты
    drawCard(50, 50, 100, 150, 'K', 'hearts');
    drawCard(200, 50, 100, 150, '', '', false); // Рубашка
});