# White Canvas Boilerplate Documentation

## Application:

- ### Requirements

  - nodejs: 20.11.0
  - npm: 10.2.4
  - php: 8.2.10
  - composer: 2.6.4

- ### Setup Notes

  If you have issues to link the right versions of php or composer on MACOS by using link and unlink homebrew commands, follow those steps:

  1. Install using the terminal required versions of php and composer from homebrew.
  2. For enable the right verison of PHP paste this into a terminal `echo 'export PATH="/usr/local/opt/php@8.2.5/bin:$PATH"' >> ~/.zshrc` and hit enter.
  3. For enable the right verison of composer paste this into a terminal `echo 'export PATH="/usr/local/opt/composer@2.5.5/bin:$PATH"' >> ~/.zshrc` and hit enter.
  4. To apply this changes paste this line into a terminal `source ~/.zshrc` and hit enter.

- ### Docker Environment (Optional)

  To simplify the process of install the required packages we have already build an docker image with all packages already installed.

  To setup your docker environment follow those steps:

  1. Install [Docker Desktop](https://www.docker.com/products/docker-desktop/)
  2. Install [Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers) VS-Code extension.
  3. Create an `docker-compose.yml` file on root level to setup your environment just like this example:
     ```
     version: "3.9"
     services:
       builder:
         image: whitecanvas/builder-v8:1.0.6
         volumes:
           - ./:/media/
         extra_hosts:
           - "boilerplate.local:192.168.1.6"
         command:
           - sh
         tty: true
     ```
     - Replace `boilerplate.local` with the virtualhost that LocalWP created.
     - Replace `192.168.1.6` with your machine ip, you can get it running this command `ifconfig | grep "inet " | grep -v 127.0.0.1 | awk '{print $2}'`
  4. Starup your container running `docker-compose up -d`, this command will pull the image the first time that you use it and then it will run your container in background (you can check it in Docker Desktop app, the cli or with Dev Containers extension)
  5. Open the Remote Exporer icon on the sidebar of VS-Code, look for your container and click on Attach to container.
  6. Open the `/media/` directory in your VS-Code new container window and have fun!
  7. To turn off and destroy your container run `docker-compose down`.

  Note that you can use the image `builder` as well in MACOS but it works slow vs `builder-v8`.

- ### Boilerplate Documentation

  This is a boilerplate starter theme for White Canvas Wordpress FSE projects. It is not meant to be used as is, but as a starting point for custom themes for each client. There are several pre defined blocks available after installation and an ACF sync.

  - Blocks starting point and examples - ACF fields, templates, template-parts, SASS, and animations.
  - Components.
  - Commonly needed third party scripts - [Gsap](https://greensock.com/gsap/), [Swiper](https://swiperjs.com/), [Axios](https://axios-http.com/docs/intro).
  - Organized global SASS files to quickly get started with custom designs.
  - PSR-4 file standard for PHP.
  - JS and SCSS Linters.

- ### White Canvas Development Guide

  Please take a moment to read our [development guide here](https://www.notion.so/Full-Site-Editing-FSE-Boilerplate-577af440e6f6467eb7d894aaf43ad1a2)
  ​

- ### Getting Started

  ***

  1.  ​Start up a [LocalWP](https://localwp.com/) project with default config.
  2.  Go to the site folder/app and delete the public folder
  3.  Clone the repository on the app folder and rename the repository folder as public.
  4.  Copy the content of wp-config-sample.php into a brand new wp-config.php file
  5.  Change the database name (local), user (root), and password (root).
  6.  Change the theme folder name (wcanvas-boilerplate) for the name of your project.
  7.  On the folder of your theme run `npm install` and `composer install` in order to install all the dependencies and setup PSR-4.
  8.  Create a `.env` file on the theme's root and copy the contents of the `.env-webpack` file inside, then change the `LOCAL_SERVER_URL` variable inside the `.env` file to point to you LocalWP Site Domain.
  9.  Run `npm run dev` to start coding, this should open your site with browser sync (that allow you to work with auto refresh each time you save some file).
  10. Then it is recommended to find/replace particular strings within the theme to make it client specific. It is important to make sure you are matching on case.

      1.  Search for: `WCBFSE` and replace with: `CustomThemePrefix`. This should catch classes prefix (autoload psr-4 composer namespace).
      2.  Search for: `wcb` and replace with: `customthemeprefix`. PHP variables, CSS and Tailwind classes prefixes.
      3.  Search for: `wcanvas-boilerplate` and replace with: `custom-theme-text-domain`. This should catch text domains.
      4.  Search for: `example.com` and replace with: `example.com`. Boilerplate/Theme author url.
      5.  Search for: `white canvas` and replace with: `author name`. Boilerplate/Theme author name.
      6.  Search for: `whitecanvas` and replace with: `authorname`. composer.json name.
      7.  Run `composer dump` at the cli to reset the psr-4 autoloader.

              After the optional renaming, these steps will get the theme ready for you to start developing.

  11. Activate all plugins.
  12. Activate your theme.
  13. Go into Custom Fields and sync all fields.
  14. Have fun!

- ### Plugins in use

  - [Advanced Custom Fields PRO](https://www.advancedcustomfields.com/)
  - [Yoast SEO](https://yoast.com/)
  - [Gravity Forms](https://www.gravityforms.com/)
  - [EWWW Image Optimizer](https://ewww.io/)
  - [Safe SVG](https://wordpress.org/plugins/safe-svg/)
  - [Wordfence Security](https://www.wordfence.com/)
  - [Activity Log](https://wordpress.org/plugins/aryo-activity-log/)
  - [WPS Hide Login](https://wordpress.org/plugins/wps-hide-login/)

- ### Create a Block

  1. We can create a block by using the `npm run block -- [block-name]` command on the theme's directory.
     1. Go to your theme folder and open the terminal
     2. Create a block by running this command `npm run block -- [block-name]` where the `[block-name]` is the name of the block separate by a dash. _(If a prompt is displayed to install the creat-block package, hit `y` and press enter on the terminal)_
        - example: `npm run block -- hero`
        - Once the command finishes you will see a folder with the name of the block inside the `/blocks` folder.
        - You will see that all the files needed to create a block are already on your new block's folder.
  2. Restart the dev server with `npm run dev`.
  3. For more details go to the [boiler documentation - Creating a Block]().

- ### Create a Component
  Components are a combination of php and scss files intended to be used inside multiple blocks.
  1. We can create a component by using the `npm run component -- [component-name]` command on the theme's directory.
     1. Go to your theme folder and open the terminal
     2. Create a component by running this command `npm run component -- [component-name]` where the `[component-name]` is the name of the component separate by a dash.
        - Example: `npm run component -- card`
        - Once the command finishes you will see a folder with the name of the component inside the `/components` folder.
        - You will see that all the files needed to create a component are already on your new component's folder.
  2. Restart the dev server with `npm run dev`.
  3. For more details go to the [boiler documentation - Creating a Component]().

## Linters

We're extending the @wordpress/scripts linters/fixers configuration for javascript and css.
And for PHP we are extending the WordPress PHPCS configuration.

### Resources

- [@wordpress/scripts](https://github.com/WordPress/gutenberg/tree/trunk/packages/scripts).
- [WordPress Coding Standards](https://github.com/WordPress/WordPress-Coding-Standards).

### What does these Linters need?

This Linters will need you to run `npm install` for the JS and SCSS linters, and a `composer install` for the PHP Code Sniffer.

Both commands should be run from the theme folder.

Run the npm install from the VSCode console directly (you'll need NodeJS installed).

For the composer command, you can run it from the Site Shell of any LocalWP site you've already have configured.

### How to configure Visual Studio Code

1. Once you've cloned this project, you'll have a `.vscode` folder in the root dir. This folder contains the _settings_ and _extensions_ recommended for your workspace.
2. Go to Extensions > Filter by "Recommended" > Install All
3. When you change the theme name, you'll have to update the theme name in the file `.vscode/settings.json`, for the options:

```json
{
  "phpsab.executablePathCS": "wp-content/themes/<<THEME-NAME>>/vendor/bin/phpcs",
  "phpsab.executablePathCBF": "wp-content/themes/<<THEME-NAME>>/vendor/bin/phpcbf"
}
```

4. That's it, you're ready to work!

### How to run the Linters and Fixers

To run the linters or fixers manually (yup, every linter comes with a fixer out of the box!) you'll have a few commands pre-configured both in the `package.json` and `composer.json` files.

The linters installed in this boilerplate are:

- [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer)
- [ESLint](https://eslint.org/docs/latest/user-guide/getting-started)
- [StyleLint](https://stylelint.io/)

```
NOTE: We'll describe a few useful commands. For more advanced configuration or options, please refer to each linter documentation.
```

All commands should be run from within the theme folder.

**PHPCS**

From your LocalWP dashboard, open the "Site Shell" and execute this commands

Scan for issues

```
$ composer run check-cs
```

Try to fix the issues (as every other linter, this will try fix simple issues like indentation).

```
$ composer run fix-cs **/*.php
```

**ESLint + StyleLint**

From the Visual Studio Code Console, run this commands:

Scan for issues

```
$ npm run lint:js
$ npm run lint:css
```

Try to fix issues

```
$ npm run fix:js
$ npm run fix:css
```

---

## Repository

- ### How to name your branch:

  {issue-id}-{dev-initials}-[feature, hotfix]-{short-description}

  Example: 75-sp-feature-add-hero-home

- ### How you should describe your commits:

  {issue-id}-[feature, hotfix]: {short description}

  Example: 75-feature: created home hero acf

- ### How you should name the merge request:

  Draft: {title of the issue-task}

  Example: Draft: Resolve "New Issue test"

- ### Pipelines

  We use manual actions pipelines, that allow us to deploy stages from gitlab pull requests.
  Also we have [docker images](https://hub.docker.com/repositories/whitecanvas) created to build our app.

  Pipeline file => `.gitlab-ci.yml`

## Skeleton (In Progress)

We have a bunch of skeleton blocks already builded, you can find them on `blocks/`.
All of them are functional and you can test them creating a page on the admin side.
Also we have a [live environment](https://boilerplatefse.wpengine.com/) with all blocks and data entry to check their behaviour.
More data and access credentials on the [development guide](https://docs.google.com/document/d/17wUxX3Kp_siZMhzcDGllFkcbNHbYbg1qnnq1l3mcOnk/edit?usp=sharing).
