<img src="https://cdn.rawgit.com/joshuabaker/craft-embed/f848c178/resources/icon.svg" width="72">

# Embed plugin for Craft CMS

Craft CMS plugin that extracts information about web pages, like Youtube videos, Twitter statuses or blog articles.

<img src="https://cdn.rawgit.com/joshuabaker/craft-embed/f848c178/resources/screenshots/preview.jpg">

## Usage

Embed comes with two methods for extracting information from links; Fields, which can be included in control panel entry types, and a plugin service, which can be used in both templates and other plugins.

#### Field

Links entered into the Embed field are validated.

```twig
{{ entry.embedField.html }}
```

Here are the default properties provided:

* type
* version
* url
* title
* description
* authorName
* authorUrl
* providerName
* providerUrl
* cacheAge
* thumbnailUrl
* thumbnailWidth
* thumbnailHeight
* html
* width
* height

#### Templates

The same properties are made available via the template variable and plugin service.

Below is an example for extracting embed code from a YouTube link, including styling to ensure it’s responsive.

```twig
{% set info = craft.embed.extract('https://www.youtube.com/watch?v=NPoHPNeU9fc') %}

<div class="responsive">
  {{ info.html }}{# Outputs whatever HTML has been extracted #}
</div>

{# Calculate ratio for padding #}
{% set ratio = (info.height|default(9) / info.width|default(16)) %}

<style>
  .responsive {
    position: relative;
    padding-bottom: {{ ratio * 100 }}%;
  }
  .responsive > * {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
  }
</style>
```

## Providers

Support is available for the follow providers as well as well-formed Open Graph tagged links.

```html
23hq                Deviantart          Kickstarter         Sketchfab
Animoto             Dipity              Meetup              SlideShare
Aol                 Dotsub              Mixcloud            SoundCloud
App.net             Edocr               Mobypicture         SpeakerDeck
Bambuser            Flickr              Nfb                 Spotify
Bandcamp            FunnyOrDie          Official.fm         Ted
Blip.tv             Gist                Polldaddy           Twitter
Cacoo               Gmep                PollEverywhere      Ustream
CanalPlus           HowCast             Prezi               Vhx
Chirb.it            Huffduffer          Qik                 Viddler
CircuitLab          Hulu                Rdio                Videojug
Clikthrough         Ifixit              Revision3           Vimeo
CollegeHumor        Ifttt               Roomshare           Vine
Coub                Imgur               Sapo                Wistia
CrowdRanking        Instagram           Screenr             WordPress
DailyMile           Jest                Scribd              Yfrog
Dailymotion         Justin.tv           Shoudio             Youtube
```
