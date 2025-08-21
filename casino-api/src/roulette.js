import { Router } from 'express';
import { z } from 'zod';
import { randomInt } from 'crypto';

const router = Router();

const betSchema = z.object({
  bet: z.object({
    type: z.enum(['number', 'color', 'parity', 'dozen']),
    value: z.union([
      z.number().int().min(0).max(36),
      z.enum(['red', 'black']),
      z.enum(['odd', 'even']),
      z.union([z.literal(1), z.literal(2), z.literal(3)])
    ]),
    amount: z.number().positive().finite().max(1000000)
  })
});

const redNumbers = new Set([1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36]);

function getColor(number) {
  if (number === 0) return 'green';
  return redNumbers.has(number) ? 'red' : 'black';
}

function getParity(number) {
  if (number === 0) return 'none';
  return number % 2 === 0 ? 'even' : 'odd';
}

function getDozen(number) {
  if (number === 0) return 0;
  if (number >= 1 && number <= 12) return 1;
  if (number >= 13 && number <= 24) return 2;
  return 3;
}

function spinWheel() {
  return randomInt(0, 37); // 0..36 inclusive
}

router.post('/spin', (req, res) => {
  const parseResult = betSchema.safeParse(req.body);
  if (!parseResult.success) {
    return res.status(400).json({ error: 'Invalid request', details: parseResult.error.flatten() });
  }

  const { bet } = parseResult.data;

  const outcome = spinWheel();
  const outcomeColor = getColor(outcome);
  const outcomeParity = getParity(outcome);
  const outcomeDozen = getDozen(outcome);

  let isWin = false;
  let payoutMultiplier = 0;

  if (bet.type === 'number') {
    if (typeof bet.value !== 'number') {
      return res.status(400).json({ error: 'For type number, value must be an integer 0..36' });
    }
    isWin = outcome === bet.value;
    payoutMultiplier = 35;
  } else if (bet.type === 'color') {
    if (bet.value !== 'red' && bet.value !== 'black') {
      return res.status(400).json({ error: "For type color, value must be 'red' or 'black'" });
    }
    isWin = outcomeColor === bet.value;
    payoutMultiplier = 1;
  } else if (bet.type === 'parity') {
    if (bet.value !== 'odd' && bet.value !== 'even') {
      return res.status(400).json({ error: "For type parity, value must be 'odd' or 'even'" });
    }
    isWin = outcomeParity === bet.value;
    payoutMultiplier = 1;
  } else if (bet.type === 'dozen') {
    if (![1,2,3].includes(bet.value)) {
      return res.status(400).json({ error: 'For type dozen, value must be 1, 2, or 3' });
    }
    isWin = outcomeDozen === bet.value;
    payoutMultiplier = 2;
  }

  const winAmount = isWin ? bet.amount * payoutMultiplier : 0;
  const balanceChange = winAmount - bet.amount;

  return res.json({
    game: 'roulette',
    bet,
    outcome: {
      number: outcome,
      color: outcomeColor,
      parity: outcomeParity,
      dozen: outcomeDozen
    },
    result: {
      isWin,
      payoutMultiplier,
      winAmount,
      balanceChange
    }
  });
});

export default router;
