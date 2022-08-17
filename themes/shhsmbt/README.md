# shhsmbt

##Setup

_This isn't perfect and will be changed as we go_

- setup a new WordPress local environment in Local by Flywheel
- make the URL shhsmbt.local
- In your public folder for the site, delete wp-content directory in your install
- git clone repo `git clone https://github.com/jeffrainey/template.git wp-content`
- In your WordPress admin, change the theme to *shhsmbt*

Makes sure you put all of your assets in: **/wp-content/themes/shhsmbt/src/**

On build your assets will be moved to the _dist_ directory: **/wp-content/themes/shhsmbt/dist/**

This directory get overwritten with each build, so it is important that you do not place items here directly.

Back in your terminal install the theme:

```cd /themes/shhsmbt```

```npm install```

```npm start```


##Production Build

The following minifies js and css files and creates a production build.

```npm run build```

The following script is coming soon and will package everything into a zip file without the node modules, src and other directories.

```npm run package```









##Genesis Blocks Information
**Documentaion:** https://developer.wpengine.com/genesis-custom-blocks/

Blocks for this theme are found in: **/wp-content/themes/shhsmbt/blocks**
