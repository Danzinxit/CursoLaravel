import express from 'express';
import cors from 'cors';

import rouletteRouter from './roulette.js';
import slotsRouter from './slots.js';

const app = express();
app.use(cors());
app.use(express.json());

app.get('/health', (req, res) => {
  res.json({ status: 'ok' });
});

app.get('/games', (req, res) => {
  res.json({ games: ['roulette', 'slots'] });
});

app.use('/roulette', rouletteRouter);
app.use('/slots', slotsRouter);

const port = process.env.PORT || 3000;
app.listen(port, () => {
  console.log(`Casino API listening on port ${port}`);
});