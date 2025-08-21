import { Router } from 'express';
import { z } from 'zod';
import { randomInt } from 'crypto';

const router = Router();

const spinSchema = z.object({
  amount: z.number().positive().finite().max(1000000)
});

const symbols = [
  { name: 'cherry', weight: 30, threeKind: 3, twoKind: 1 },
  { name: 'lemon', weight: 25, threeKind: 5, twoKind: 2 },
  { name: 'orange', weight: 20, threeKind: 7, twoKind: 2 },
  { name: 'plum', weight: 12, threeKind: 10, twoKind: 3 },
  { name: 'bell', weight: 8, threeKind: 25, twoKind: 5 },
  { name: 'bar', weight: 4, threeKind: 50, twoKind: 10 },
  { name: 'seven', weight: 1, threeKind: 100, twoKind: 20 }
];

const totalWeight = symbols.reduce((sum, s) => sum + s.weight, 0);

function weightedRandomSymbol() {
  const r = randomInt(0, totalWeight);
  let cumulative = 0;
  for (const s of symbols) {
    cumulative += s.weight;
    if (r < cumulative) return s.name;
  }
  return symbols[symbols.length - 1].name;
}

router.post('/spin', (req, res) => {
  const parseResult = spinSchema.safeParse(req.body);
  if (!parseResult.success) {
    return res.status(400).json({ error: 'Invalid request', details: parseResult.error.flatten() });
  }
  const { amount } = parseResult.data;

  const reel = [weightedRandomSymbol(), weightedRandomSymbol(), weightedRandomSymbol()];

  let payoutMultiplier = 0;
  if (reel[0] === reel[1] && reel[1] === reel[2]) {
    const sym = symbols.find(s => s.name === reel[0]);
    payoutMultiplier = sym?.threeKind ?? 0;
  } else if (reel[0] === reel[1] || reel[0] === reel[2] || reel[1] === reel[2]) {
    const pairSymbol = reel[0] === reel[1] ? reel[0] : (reel[0] === reel[2] ? reel[0] : reel[1]);
    const sym = symbols.find(s => s.name === pairSymbol);
    payoutMultiplier = sym?.twoKind ?? 0;
  }

  const winAmount = amount * payoutMultiplier;
  const balanceChange = winAmount - amount;

  return res.json({
    game: 'slots',
    bet: { amount },
    reel,
    result: {
      payoutMultiplier,
      winAmount,
      balanceChange
    }
  });
});

export default router;
