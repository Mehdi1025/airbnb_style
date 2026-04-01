from pathlib import Path
root = Path(__file__).parent / "resources" / "views"
old = 'asset(\'images/logo.png\') }}" type="image/jpeg"'
new = 'asset(\'images/logo.png\') }}" type="image/png"'
for p in root.rglob("*.blade.php"):
    t = p.read_text(encoding="utf-8")
    if old in t:
        p.write_text(t.replace(old, new), encoding="utf-8")
        print("fixed", p)
