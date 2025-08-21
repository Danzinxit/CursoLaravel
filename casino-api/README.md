# Casino Games API

API simples e segura de jogos de cassino (Roleta e Caça‑Níqueis) construída com Node.js e Express.

## Recursos
- Aleatoriedade segura usando `crypto.randomInt`
- Validação de entrada com Zod
- Endpoints para Roleta e Caça‑Níqueis
- CORS habilitado

## Endpoints
- GET `/health` — status do serviço
- GET `/games` — lista de jogos disponíveis
- POST `/roulette/spin` — gira a roleta com uma aposta
- POST `/slots/spin` — gira o caça‑níqueis

### POST /roulette/spin
Body:
```json
{
  "bet": {
    "type": "number | color | parity | dozen",
    "value": "0-36 para number | red|black para color | odd|even para parity | 1|2|3 para dozen",
    "amount": 10
  }
}
```
Resposta (exemplo):
```json
{
  "game": "roulette",
  "bet": { "type": "color", "value": "red", "amount": 10 },
  "outcome": { "number": 14, "color": "red", "parity": "even", "dozen": 2 },
  "result": { "isWin": true, "payoutMultiplier": 1, "winAmount": 10, "balanceChange": 0 }
}
```

### POST /slots/spin
Body:
```json
{ "amount": 5 }
```
Resposta (exemplo):
```json
{
  "game": "slots",
  "bet": { "amount": 5 },
  "reel": ["lemon", "lemon", "plum"],
  "result": { "payoutMultiplier": 2, "winAmount": 10, "balanceChange": 5 }
}
```

## Como rodar
```bash
npm install
npm run dev # hot reload com nodemon
# ou
npm start   # produção
```
URL padrão: http://localhost:3000
