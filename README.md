<img src="https://cdn.rawgit.com/joshuabaker/craft-embed/752502faba7958bdd018ef5ff2f38813642fe54f/resources/icon.svg" width="72">

# Embed plugin for Craft CMS

Craft CMS plugin that extracts information about web pages, like Youtube videos, Twitter statuses or blog articles.

## Usage

#### Field

Embed comes with a field that validates input when saving an entry.

```twig
{{ entry.embedField.html }}
```

#### Service

```twig
{{ craft.embed.extract('https://www.youtube.com/watch?v=NPoHPNeU9fc') }}
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
