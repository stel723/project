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

    // Пример: отрисовка тестовой карты
    drawCard(50, 50, 100, 150, 'K', 'hearts');
    drawCard(200, 50, 100, 150, '', '', false); // Рубашка
});