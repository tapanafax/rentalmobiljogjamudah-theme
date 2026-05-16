# rentalmobiljogjamudah — WordPress Theme Development Context

> **For the assistant reading this:** This is a new WordPress theme build, starting from scratch in this local repo. Build the files phase-by-phase in the order listed under "Build Status." All design decisions, conventions, and file specifications are locked — follow them exactly. Confirm with the user before starting each new phase.

---

## Project Overview
Custom **WordPress theme** for a Jogja car rental business — **Rental Mobil Jogja Mudah** (RMJM).
Pure PHP, no page builder. Full blog support. Custom post type for fleet.

---

## 🔒 Decisions Locked

| Decision | Choice |
|---|---|
| Theme approach | **Pure custom PHP** (no Elementor) |
| Fleet management | **Custom Post Type `armada`** (not hardcoded, not standard Pages) |
| Development environment | **Claude Code in terminal** (local repo, direct file edits, `git` from CLI) |
| Hosting provider | **Hostinger** (SSH access available; hPanel Git not yet configured) |
| Layout reference | https://sewamobiljogjaamanda.com/ (structure only — do not copy code) |
| Color palette source | https://sewamobiljogjamudah.com/ hero section (blue, NOT orange) |
| Heading font | Plus Jakarta Sans (Google Fonts) |
| Body font | Inter (Google Fonts) |
| Text domain | `rmjm` |
| Function prefix | `rmjm_` |
| Post meta key prefix | `_rmjm_` (underscore makes it hidden from default custom-fields UI) |

---

## 📦 Build Status

### ⬜ Phase 1 — Foundation (BUILD FIRST)
Four files. Build them in this order, commit, then move to Phase 2.

| File | Purpose | Must contain |
|---|---|---|
| `style.css` | WordPress theme header | Theme metadata block only (Theme Name, URI, Author, Description, Version, License, Text Domain `rmjm`). No actual styles — those live in `assets/css/main.css`. |
| `assets/css/main.css` | All styles | Use `theme-style-reference.css` (in `/uploads`) as the base. Append: mobile menu (section 17), page/archive/pagination (section 18), WordPress core compatibility — `.alignleft`, `.alignright`, `.aligncenter`, `.alignwide`, `.alignfull`, `.wp-caption`, `.screen-reader-text`, `.skip-link`, comments (section 19). |
| `assets/js/main.js` | Vanilla JS | Mobile menu toggle (`.mobile-menu-toggle` + `.site-nav-mobile.is-open`), smooth-scroll for `a[href^="#"]`. No jQuery. |
| `functions.php` | Theme engine | See exact contents in section "What `functions.php` Must Provide" below. |

### ⬜ Phase 2 — Layout shell & homepage
- [ ] `header.php` — sticky nav, logo, primary menu, mobile hamburger, header CTA
- [ ] `footer.php` — footer grid (brand, links, contact, social), bottom bar, floating WhatsApp button
- [ ] `front-page.php` — homepage that calls all section partials in order
- [ ] `template-parts/hero.php` — full-bleed gradient hero with badge, title, subtitle, two CTAs, trust badges, right-side image
- [ ] `template-parts/services.php` — 3-column grid of service cards (Rental Harian, Sewa + Sopir, Antar Jemput Bandara, Lepas Kunci, Rental Bulanan, Support 24/7)
- [ ] `template-parts/fleet.php` — pulls latest Armada CPT posts, renders fleet card grid (image, category badge, name, price, specs, features, two CTAs per card)
- [ ] `template-parts/testimonials.php` — 3-column testimonial cards (can be a simple PHP array for now, or a future "testimonial" CPT)
- [ ] `template-parts/blog-preview.php` — latest 3 blog posts (`WP_Query`) in card grid

### ⬜ Phase 3 — Blog & supporting templates
- [ ] `index.php` — fallback (required by WP)
- [ ] `single.php` — single blog post (post-hero with gradient + meta, then `.post-content` body)
- [ ] `archive.php` — blog/archive listing with pagination
- [ ] `page.php` — generic WP page
- [ ] `search.php` — search results
- [ ] `404.php` — friendly not-found page
- [ ] `comments.php` — comment list + form (styles already in main.css)
- [ ] `single-armada.php` — single car page (full specs, gallery, big WA button)
- [ ] `archive-armada.php` — all cars listing

### ⬜ Phase 4 — Polish
- [ ] `screenshot.png` (1200×900) — appears in Appearance → Themes
- [ ] Sample content seed (1-2 demo Armada posts, demo blog post) — manual via WP admin
- [ ] Test responsive breakpoints on phone
- [ ] Test WP admin Customizer (Appearance → Customize → Info Bisnis RMJM)
- [ ] Verify Armada CPT permalinks work (`/armada/{slug}/`)

---

## 🧱 What `functions.php` Must Provide

Build `functions.php` to include all of the following. This is the spec — match it.

**Theme support:** `title-tag`, `post-thumbnails`, `custom-logo` (200×48 flex), HTML5 markup, `align-wide`, `responsive-embeds`, automatic feed links.

**Custom image sizes:**
- `rmjm-fleet` — 600×400 cropped (fleet card thumbnails)
- `rmjm-blog` — 800×500 cropped (blog card thumbnails)
- `rmjm-hero` — 1200×800 cropped (large feature images)

**Nav menu locations:**
- `primary` — header
- `footer` — footer column

**Custom Post Type `armada`:**
- Menu in admin sidebar: "Armada" with car icon, position 5
- Supports: title, editor, thumbnail, excerpt, page-attributes (for manual ordering)
- Permalink: `/armada/{slug}/`, archive at `/armada/`
- REST-enabled (works with Gutenberg)
- **Taxonomy `armada_kategori`** — hierarchical (like categories), e.g. "MPV", "City Car", "SUV". URL: `/kategori-mobil/{slug}/`

**Armada meta box "Detail Mobil"** (saved as `_rmjm_{key}`):
- `price` — raw number, e.g. `350000`
- `price_label` — e.g. `/ hari` or `/ 24 jam`
- `seats` — e.g. `7`
- `transmission` — `Manual` or `Automatic`
- `fuel` — e.g. `Bensin`
- `luggage` — e.g. `3 koper`
- `features` — comma-separated string, e.g. `AC, Audio, Power Window, USB`
- `whatsapp_msg` — optional override (otherwise auto-generated per car)

**Customizer panel "Info Bisnis RMJM"** (Appearance → Customize):
- `rmjm_whatsapp_number` (e.g. `6281234567890` — no `+` or leading `0`)
- `rmjm_whatsapp_default_msg`
- `rmjm_phone`, `rmjm_email`, `rmjm_address`
- `rmjm_instagram`, `rmjm_facebook`, `rmjm_tiktok`
- `rmjm_hero_tagline`, `rmjm_hero_title` (allows `<span>` for the accent-colored part), `rmjm_hero_subtitle`

**Helper functions (use these everywhere instead of duplicating logic):**
```php
rmjm_whatsapp_url( $message = '' )           // generic WA link, falls back to Customizer default
rmjm_armada_whatsapp_url( $post_id )         // per-car WA link, auto-builds "I want to rent the [Car Name]" message
rmjm_format_price( $amount )                 // 350000 → "Rp 350.000"
rmjm_armada_meta( $key, $post_id = null, $fallback = '' )
rmjm_armada_features( $post_id = null )      // returns array, split from comma string
```

**Excerpt tweaks:** 22 words, ellipsis read-more.

**Activation hook:** `flush_rewrite_rules()` runs on theme switch so Armada permalinks work immediately.

---

## 🎨 What `assets/css/main.css` Must Provide

The class system is fixed. Use these classes when writing markup in Phase 2+. Below is the inventory of selectors that must exist in `main.css` (most come from `theme-style-reference.css`, the rest must be added).

| Section | Key classes |
|---|---|
| Layout | `.container`, `.section`, `.section--light`, `.section--blue-tint`, `.section--dark`, `.section-title`, `.section-title--center`, `.section-subtitle`, `.section-header` |
| Buttons | `.btn`, `.btn-primary`, `.btn-outline`, `.btn-outline-white`, `.btn-whatsapp`, `.btn-sm`, `.btn-lg` |
| Header | `.site-header`, `.site-logo`, `.site-nav`, `.site-nav-mobile`, `.mobile-menu-toggle` |
| Hero | `.hero`, `.hero-content`, `.hero-badge`, `.hero-title` (use `<span>` inside for accent), `.hero-description`, `.hero-actions`, `.hero-trust`, `.trust-badge`, `.hero-image` |
| Services | `.services-grid`, `.service-card`, `.service-card .icon-wrap`, `.feature-list` |
| Fleet | `.fleet-grid`, `.fleet-card`, `.fleet-card-image`, `.fleet-category-badge`, `.fleet-card-body`, `.fleet-price` (`.amount` + `.period`), `.fleet-specs`, `.fleet-spec`, `.fleet-features`, `.fleet-feature-tag`, `.fleet-card-actions` |
| Blog | `.blog-grid`, `.blog-card`, `.blog-card-image`, `.blog-card-body`, `.blog-card-meta`, `.blog-category`, `.blog-date`, `.read-more` |
| Single post | `.post-hero`, `.post-hero-meta`, `.post-content` |
| Testimonials | `.testimonials-grid`, `.testimonial-card`, `.testimonial-stars`, `.testimonial-text`, `.testimonial-author` |
| Footer | `.site-footer`, `.footer-grid`, `.footer-brand`, `.footer-col`, `.footer-bottom` |
| WhatsApp float | `.wa-float` (already has pulse animation) |
| Page/Archive | `.page-hero`, `.pagination`, `.no-results` |
| WP compat | `.alignleft`, `.alignright`, `.aligncenter`, `.alignwide`, `.alignfull`, `.wp-caption`, `.screen-reader-text`, `.skip-link` |

**Responsive breakpoints already wired:** 1024px (grids → 2 col, hero stacks, hero image hidden), 900px (mobile menu activates), 640px (grids → 1 col, hero actions stack).

---

## 🧭 Coding Conventions Established

When writing any file, all sessions must follow these conventions:

1. **Prefix everything `rmjm_`** — functions, hooks, IDs. Post meta uses `_rmjm_` (leading underscore).
2. **Text domain is `rmjm`** — all user-facing strings wrapped: `__( 'Text', 'rmjm' )` or `esc_html__()`.
3. **Always escape output:** `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()` (the last one for content that may contain `<span>` etc., like the hero title).
4. **Always use `ABSPATH` guard** at the top of every PHP file:
   ```php
   if ( ! defined( 'ABSPATH' ) ) { exit; }
   ```
5. **Use `get_template_part()`** for homepage sections: `get_template_part( 'template-parts/hero' );`
6. **Use `RMJM_DIR` and `RMJM_URI` constants** (defined in `functions.php`) for absolute paths and URLs.
7. **Indonesian for user-visible content**, English for code comments and admin labels where appropriate.
8. **Use the helper functions** instead of hand-building WhatsApp URLs or formatting prices.
9. **Image sizes:** `the_post_thumbnail( 'rmjm-fleet' )` for fleet cards, `'rmjm-blog'` for blog, `'rmjm-hero'` for large.
10. **No jQuery.** All JS in `assets/js/main.js` is vanilla. Keep it that way.

---

## 🛠️ Final File Structure (Target)

```
rentalmobiljogjamudah-theme/
├── style.css                  ⬜ phase 1
├── functions.php              ⬜ phase 1
├── index.php                  ⬜ phase 3
├── front-page.php             ⬜ phase 2
├── header.php                 ⬜ phase 2
├── footer.php                 ⬜ phase 2
├── page.php                   ⬜ phase 3
├── single.php                 ⬜ phase 3
├── archive.php                ⬜ phase 3
├── search.php                 ⬜ phase 3
├── 404.php                    ⬜ phase 3
├── comments.php               ⬜ phase 3
├── single-armada.php          ⬜ phase 3
├── archive-armada.php         ⬜ phase 3
├── screenshot.png             ⬜ phase 4
├── template-parts/
│   ├── hero.php               ⬜ phase 2
│   ├── services.php           ⬜ phase 2
│   ├── fleet.php              ⬜ phase 2
│   ├── testimonials.php       ⬜ phase 2
│   └── blog-preview.php       ⬜ phase 2
└── assets/
    ├── css/main.css           ⬜ phase 1
    ├── js/main.js             ⬜ phase 1
    └── images/                ⬜ as needed
```

---

## 🗂️ GitHub Repository

- **URL:** https://github.com/tapanafax/rentalmobiljogjamudah-theme
- **Owner:** tapanafax
- **Branch:** master
- **Visibility:** Public

### Daily git workflow
```bash
# Always pull first
git pull origin HEAD

# After changes
git add .
git commit -m "describe what changed"
git push origin HEAD
```

### If you edited on github.com directly
```bash
git pull origin HEAD  # sync those changes down before working locally
```

### Auth
GitHub doesn't accept account passwords. Use a **Personal Access Token (PAT)** with `repo` scope: https://github.com/settings/tokens/new

Save credentials to macOS keychain:
```bash
git config --global credential.helper osxkeychain
```

---

## 🚀 Deploying to Hostinger

The site lives on Hostinger. SSH is enabled on the plan. Three deployment options below, ranked best-to-worst for this project.

### Hostinger paths cheat sheet

For a site `yourdomain.com` on Hostinger shared hosting, the theme folder is:
```
/home/{HOSTINGER_USERNAME}/domains/yourdomain.com/public_html/wp-content/themes/rentalmobiljogjamudah-theme
```
- `{HOSTINGER_USERNAME}` looks like `u123456789` (find it in **hPanel → Hosting → Manage → Advanced → SSH Access**).
- SSH port on Hostinger shared plans is **65002** (not 22). Host is your server IP from the same SSH Access page.

---

### 🥇 Option A — hPanel Git deployment (recommended; auto-deploy on push)

Easiest path. Hostinger pulls from GitHub automatically every time you push to `master`. No SSH key juggling, no manual `git pull`.

1. Log into **hPanel** → **Websites** → click **Manage** on your domain.
2. In the left sidebar, search **Git** and open it.
3. Click **Continue with GitHub** and authorize Hostinger via OAuth.
4. Pick the repository **`tapanafax/rentalmobiljogjamudah-theme`**.
5. **Deployment settings:**
   - **Branch:** `master`
   - **Repository directory (deploy path):** `public_html/wp-content/themes/rentalmobiljogjamudah-theme`
   - **Auto-deployment:** ✅ enable (any push to `master` will redeploy)
6. Click **Deploy**.
7. Once deploy finishes, go to **WP Admin → Appearance → Themes → Activate** "Rental Mobil Jogja Mudah."

After this is set up, the daily workflow is just:
```bash
git add . && git commit -m "..." && git push origin HEAD
# Hostinger auto-pulls within seconds. Done.
```

> ⚠️ The hPanel Git deploy **overwrites** the target folder on each run. Don't edit theme files directly on the server — always go through GitHub.

📘 Reference: <https://www.hostinger.com/support/1583302-how-to-deploy-a-git-repository-in-hostinger>

---

### 🥈 Option B — Manual `git clone` over SSH

Use this if Option A's OAuth flow gives trouble, or if you want manual control over when the server updates.

1. From **hPanel → Hosting → Manage → Advanced → SSH Access**, copy your SSH host, username, and port (65002).
2. SSH in from your local terminal:
   ```bash
   ssh -p 65002 u123456789@your-server-ip
   ```
3. Clone into the themes folder:
   ```bash
   cd ~/domains/yourdomain.com/public_html/wp-content/themes/
   git clone https://github.com/tapanafax/rentalmobiljogjamudah-theme.git
   ```
4. **WP Admin → Appearance → Themes → Activate.**

To deploy updates after pushing from your local machine:
```bash
ssh -p 65002 u123456789@your-server-ip
cd ~/domains/yourdomain.com/public_html/wp-content/themes/rentalmobiljogjamudah-theme
git pull origin HEAD
exit
```

> 💡 For private repos you'd need a deploy key or a PAT. The repo is public, so HTTPS clone works without auth.

---

### 🥉 Option C — ZIP upload via hPanel File Manager (no terminal needed)

Fallback when you just want to get the theme on the server fast.

1. GitHub → **Code → Download ZIP** of the repo.
2. hPanel → **Files → File Manager**.
3. Navigate to `public_html/wp-content/themes/`.
4. Upload the ZIP, right-click → **Extract**.
5. Rename the extracted folder from `rentalmobiljogjamudah-theme-master` to `rentalmobiljogjamudah-theme` (drop the `-master` suffix).
6. **WP Admin → Appearance → Themes → Activate.**

> ⚠️ Every code change means re-downloading and re-uploading. Painful for active development — switch to Option A as soon as possible.

---

### After first activation (any option)

1. **Settings → Permalinks → Save** — re-flushes rewrite rules so `/armada/{slug}/` URLs work.
2. **Appearance → Customize → Info Bisnis RMJM** — fill in WhatsApp number, phone, email, address, social URLs, hero text.
3. **Appearance → Menus** — create your menus, assign them to "Primary Menu" (header) and "Footer Menu" (footer) locations.
4. **Hostinger hPanel → WordPress → Performance** — make sure **LiteSpeed Cache** is on (Hostinger uses LiteSpeed by default and bakes in caching). Purge cache after the first deploy.

### Hostinger gotchas to know

- **LiteSpeed Cache plugin**: Hostinger pre-installs it. After every deploy, purge the cache (LiteSpeed Cache → Toolbox → Empty entire cache) or your CSS changes won't show.
- **Object Cache**: Hostinger may have an object cache enabled. If theme changes don't appear, check **hPanel → WordPress → Object Cache** and flush it.
- **Staging environment** (Business plan and up): **hPanel → WordPress → Staging** lets you test the theme on a copy of the site before pushing to production. Recommended before any major design change.
- **Backups**: **hPanel → Files → Backups** — Hostinger keeps daily/weekly backups. Take a manual backup before activating the new theme for the first time on a live site.
- **PHP version**: Confirm at **hPanel → Advanced → PHP Configuration**. Theme requires PHP 7.4+, prefer 8.1+.

---

## 🏢 Business Info

- **Business name:** Rental Mobil Jogja Mudah
- **Tagline:** Sewa Mobil di Yogyakarta, Mudah & Terpercaya
- **Location:** Yogyakarta, Indonesia
- **WhatsApp:** (set in Customizer)
- **Services:** Rental Harian, Lepas Kunci, Sewa + Sopir, Antar Jemput Bandara YIA, Rental Bulanan
- **Fleet:** Avanza, Brio, Xpander, Innova, Hiace (manage as Armada CPT)

---

## 📍 Instructions for Claude Code (terminal session)

1. **Read this file first.** Treat every spec in it as binding.
2. **Check the local repo state:**
   ```bash
   git status
   git pull origin HEAD
   ```
3. **Start at Phase 1.** Build `style.css`, then `functions.php`, then `assets/css/main.css`, then `assets/js/main.js`. For `main.css`, ask the user where `theme-style-reference.css` is — use it as the base and append the extra sections specified in the Phase 1 table.
4. **Build one file at a time.** Show it to the user, let them review, then move on.
5. **Use the established class names** from the CSS inventory in this doc — don't invent new ones unless adding something genuinely missing.
6. **Use the helper functions** specified for `functions.php` — `rmjm_whatsapp_url()`, `rmjm_format_price()`, etc. — don't duplicate that logic inline anywhere.
7. **After each phase, prompt the user to commit:**
   ```bash
   git add . && git commit -m "phase X: short description" && git push origin HEAD
   ```
   With Hostinger hPanel Git auto-deploy enabled (see "Deploying to Hostinger" section), the push will auto-update the live site.
8. **Confirm before starting each new phase.** Don't blast through all phases in one shot.

---

## 📎 Reference files the user should have locally

- `theme-style-reference.css` — design tokens, typography, and component styles. This is the **base** for `assets/css/main.css` — copy it verbatim, then append the extra sections (mobile menu, pagination, WordPress compat) specified in Phase 1.
- `PROJECT_CONTEXT.md` — this file. Keep it in the repo root so future sessions can read it.
