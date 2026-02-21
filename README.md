# RegimA Zone - WordPress Site

Version-controlled WordPress site deployed to [WordPress.com](https://regimaza.wpcomstaging.com) via **GitHub Deployments** (Advanced Workflow).

## Repository Structure

```
regimazone/
├── .github/
│   └── workflows/
│       └── wpcom.yml          # Advanced deployment workflow
├── themes/
│   ├── bigpoint/              # Active theme (RegimA Zone custom)
│   └── ...                    # Default themes
├── plugins/
│   ├── lollum-framework/      # Theme framework (required by bigpoint)
│   ├── gravityforms/          # Forms
│   ├── smart-slider-3/        # Slider
│   ├── wordpress-seo/         # Yoast SEO
│   └── ...                    # All managed plugins
├── .gitignore
└── README.md
```

## Deployment

This repository uses **WordPress.com GitHub Deployments** in **Advanced** mode.

**Destination:** `/wp-content`

The repo contents are merged with the existing `/wp-content` directory on the WordPress.com site. Themes and plugins pushed here override what's on the server.

### Automatic Deployment
Every push to `main` triggers the deployment workflow, which:
1. Checks out the code
2. Uploads it as a `wpcom` artifact
3. WordPress.com downloads and deploys to `/wp-content`

### Manual Deployment
Go to **WordPress.com Dashboard > Deployments** and click "Trigger manual deployment."

## What's Tracked vs. Not Tracked

| Tracked (in repo) | Not tracked (managed separately) |
|---|---|
| `themes/` — all themes | `uploads/` — media library (714 MB, via SFTP/WPVivid) |
| `plugins/` — all plugins | `mu-plugins/` — WordPress.com managed hosting plugins |
| `.github/workflows/` | WordPress core files (`wp-admin/`, `wp-includes/`) |
| Config files | Caches, backups, logs |

## Scaling

This repo serves as the **master template** for country-specific RegimA Zone sites. Clone this repo, adjust branding/content, and deploy to a new WordPress.com site.

## Related

- **Backup source:** WPVivid backup on Google Drive (`wpvivid_backup/`)
- **Clone skill:** `cogpy/wpcom-clone-deploy` — automated WPVivid restore toolkit
- **Live site:** [regimaza.wpcomstaging.com](https://regimaza.wpcomstaging.com)
