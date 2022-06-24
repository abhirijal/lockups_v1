![lcokups homepage](https://user-images.githubusercontent.com/29809542/175645677-c835ec32-12a6-4016-886a-892a1ff97f51.png)

Generates lockups in 6 file formats (.png, .svg, .jpg, .eps, .ai, .pdf) in 3 color formats (RGB, CMYK, Pantone).

** Installation (Devlopment) **
------------------

Install Symfony CLI
 - On macOS: `brew install symfony-cli/tap/symfony-cli` or view https://symfony.com/download

Install Lockup Factory
1. Create a new database and import the sql dump in `/db`.
2. Copy .env to .env.local and edit the database details (including setting a proper serverVersion param).
3. Install inkscape in your local machine by `brew install --cask inkscape` on macOS.
4. Also install imagemagick in your local machine by `brew install imagemagick` on macOS.
5. Run `composer install` & `npm install`.
6. (Dev) Edit `/etc/hosts` file to setup a unl.edu localhost domain (for the authentication system).
   1. Sample line: `127.0.0.1 lockups-local.unl.edu`
7. Run `symfony server:start` or 
8. Visit https://lockups-local.unl.edu:8000/

Note: If you're using Apache, you need to give write permission to the `/public/lockups` folder.

** Workflow **
------------------

- Client selects the lockup template, enters the details and submits it for approval.
- The approver and creative check the lockup and approve it/disapprove it/just leave feedback.
- If the lockup if approved, the application generates over 30 versions of the lockups.