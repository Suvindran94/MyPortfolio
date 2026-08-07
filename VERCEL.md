# Deploy this Laravel portfolio to Vercel

Based on: https://rezamandala.medium.com/how-to-deploy-laravel-project-to-vercel-7b3c2800e974

## Important limits

- `public/media` is large (~138MB). Vercel Hobby has tight upload/function size limits. If deploy fails on size, host media on Supabase Storage / Cloudflare R2 / Hostinger and keep only thin assets in the repo.
- Vercel PHP is serverless. Use cookie sessions + array cache (already set in `vercel.json`).
- Set **Node.js 18.x** in Vercel Project Settings (required by `vercel-php`).

## One-time setup

1. Install Vercel CLI:
   ```bash
   npm i -g vercel
   ```
2. Install PHP deps (must be uploaded; do not ignore `vendor`):
   ```bash
   composer install --no-dev --optimize-autoloader
   ```
3. Log in:
   ```bash
   vercel login
   ```

## Environment variables (Vercel Dashboard → Project → Settings → Environment Variables)

Do **not** commit secrets into `vercel.json`.

| Name | Value |
|---|---|
| `APP_KEY` | copy from local `.env` (`base64:...`) |
| `APP_URL` | your Vercel URL, e.g. `https://your-app.vercel.app` |
| `DB_HOST` | `aws-0-ap-northeast-1.pooler.supabase.com` |
| `DB_USERNAME` | `postgres.bkfoekxaqmrvoysssvhj` |
| `DB_PASSWORD` | your Supabase DB password |

Optional: `APP_DEBUG=true` temporarily if you need error pages while testing.

## Deploy

```bash
vercel
```

Production:

```bash
vercel --prod
```

## After first deploy (if static assets 404)

Vercel Dashboard → Project → Settings → Build & Development Settings:

- Output Directory → override → `public`

Then redeploy: `vercel --prod`

## Local check before deploy

```bash
php artisan config:clear
composer install --no-dev --optimize-autoloader
```
