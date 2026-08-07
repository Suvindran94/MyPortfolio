#!/usr/bin/env bash
# Usage:
#   ./database/import_to_supabase.sh "postgresql://postgres:PASSWORD@db.PROJECT_REF.supabase.co:5432/postgres"
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
SEED="$ROOT/database/supabase_seed.sql"

if [[ $# -lt 1 ]]; then
  echo "Usage: $0 <supabase-postgres-uri>"
  exit 1
fi

URI="$1"

if [[ ! -f "$SEED" ]]; then
  echo "Missing $SEED — regenerate from local MySQL first."
  exit 1
fi

cd "$ROOT"

echo "Running migrations..."
php artisan migrate --force --database=pgsql

echo "Importing seed data..."
psql "$URI" -v ON_ERROR_STOP=1 -f "$SEED"

echo "Done."
