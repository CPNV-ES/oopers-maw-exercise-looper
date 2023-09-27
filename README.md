# Exercise Looper MAW
A simple web application for creating, editing and managing questionnaires. Users can then submit answers to a questionnaire. The questionnaire creator can inspect all submitted answers.

This application is a replication of http://exercice-looper.mycpnv.ch/
## Why ? 
This app serves primarily as a demonstration of [the framework developed in parallel](https://github.com/CPNV-ES/oopers-maw-framework). It is an exercise carried out (MAW) as part of our training at CPNV.
## The developpment
- The app is made in PHP 8.2 and follow the PSR-12 standard.
- IDE is PHPStorm
- The principle followed is KISS (Keep it simple stupid)
- We use the 'GitFlow' branching strategy
- We use a scrum-based approach inside [Jira Software](https://ejcpnvprojects.atlassian.net/jira/software/projects/MAW1/boards/2/backlog)

## Get Started
### Assets
Currently due to project requirement assets include only SCSS/CSS and not JavaScript.

For assets we decided to use [Bun](https://bun.sh/).

After installing Bun run following command:
````shell
bun install
````
#### Deploy
To deploy/build assets for productions, run following command:
````shell
bun run build-css
````
#### Development
During development, use following command to watch changes on your scss file.
````shell
bun run watch
````
> ### Note
> Your SCSS target file **MUST** be named ```app.scss``` and must be place in ```assets/style/```.
> If you need an deferent file name you must edit ```package.json``` file and change called files in all command line described in ```scripts```. 