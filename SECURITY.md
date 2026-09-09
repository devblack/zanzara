# Security Policy

## Reporting a Vulnerability

If you discover a security vulnerability, please report it responsibly. **Do not open a public GitHub issue.**

Instead, email **badfarm maintainers** or use [GitHub's private vulnerability reporting](https://github.com/badfarm/zanzara/security/advisories/new) to disclose the issue.

Please include:
- A description of the vulnerability
- Steps to reproduce
- Potential impact
- Any suggested fix (if applicable)

## Response

We will acknowledge receipt within **72 hours** and aim to provide a fix or mitigation plan within **14 days** of confirmation.

## Scope

This policy covers the `badfarm/zanzara` library itself. Issues in downstream applications using Zanzara are outside our scope, though we may offer guidance.

## Supported Versions

| Version | Supported |
|---------|-----------|
| Latest release | Yes |
| Older releases | Best-effort |

## Best Practices for Users

- Never commit bot tokens to version control. Use environment variables or a `.env` file excluded via `.gitignore`.
- Restrict bot token permissions to only what your bot needs.
- Use webhook mode with HTTPS and Telegram's certificate pinning where possible.
- Keep dependencies updated via `composer update`.
