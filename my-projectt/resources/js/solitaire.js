class Solitaire {
    constructor() {
        this.deck = this.createDeck();
        this.shuffleDeck();
        this.initGame();
    }

    createDeck() {
        const suits = ['hearts', 'diamonds', 'clubs', 'spades'];
        const ranks = [...Array(13).keys()].map(i => i + 1);
        return suits.flatMap(suit => 
            ranks.map(rank => ({ suit, rank }))
    )}

    shuffleDeck() {
        for (let i = this.deck.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [this.deck[i], this.deck[j]] = [this.deck[j], this.deck[i]];
        }
    }

    initGame() {
        // Логика раздачи карт
    }
}

new Solitaire();