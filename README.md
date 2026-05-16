# Rental Mobil Jogja Mudah — WordPress Theme

Custom WordPress theme for **rentalmobiljogjamudah.com**, a car rental business based in Yogyakarta, Indonesia.

## Design References

| What | Source |
|---|---|
| Layout & structure | [sewamobiljogjaamanda.com](https://sewamobiljogjaamanda.com/) |
| Color palette (blue) | [sewamobiljogjamudah.com](https://sewamobiljogjamudah.com/) hero section |

## Features

- Custom homepage with hero, services, fleet/armada, testimonials, and blog preview sections
- Blog archive and single post templates
- WhatsApp floating CTA button
- Mobile-first responsive layout
- SEO-friendly heading structure
- No page builder dependency — pure PHP + CSS

## Theme Structure

```
rentalmobiljogjamudah-theme/
├── style.css
├── functions.php
├── index.php
├── front-page.php
├── header.php
├── footer.php
├── page.php
├── single.php
├── archive.php
├── template-parts/
│   ├── hero.php
│   ├── services.php
│   ├── fleet.php
│   ├── testimonials.php
│   └── blog-preview.php
└── assets/
    ├── css/
    │   └── main.css
    └── js/
        └── main.js
```

## Color Palette

| Token | Value | Usage |
|---|---|---|
| `--color-primary` | `#1B4FD8` | Buttons, links, accents |
| `--color-hero-bg` | `#0F2D6B` | Hero background |
| `--color-accent` | `#38BDF8` | Highlights |
| `--color-navy` | `#0A1F4E` | Footer background |

## Installation

1. Clone this repo into your WordPress themes directory:
   ```bash
   cd wp-content/themes/
   git clone https://github.com/tapanafax/rentalmobiljogjamudah-theme.git
   ```
2. Go to **WordPress Admin → Appearance → Themes** and activate **Rental Mobil Jogja Mudah**

## Development

```bash
# Pull latest changes
git pull

# Push your work
git add .
git commit -m "your message"
git push
```

## Tech Stack

- WordPress (PHP)
- Vanilla CSS with custom properties
- Vanilla JavaScript
- Google Fonts: Plus Jakarta Sans + Inter
