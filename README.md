# Craft Essence

A plugin for [Craft](http://craftcms.com) that extracts media information from URLs using OEmbed and OpenGraph.

## Installation

To install Essence, copy the `essence/` folder into `craft/plugins/`, and then go to Settings > Plugins and click the “Install” button next to “Essence”.

## Usage

#### Fields

Essence comes with a field that validates input when saving an entry. This saves some logic in templates and helps prevent content editors getting confused when nothing appears on the front-end.

```jinja
{# Output the URL (f.ex. http://vimeo.com/104385049) #}
{{ entry.essenceField }}

{# Outputs the HTML or other media information #}
{% set media = entry.essenceField.embed %}
{% if media %}
  {{ media }}
  <!-- Width: {{ media.width }} -->
{% endif %}

{# You can also pass parameters to the service endpoint #}
{% set media = entry.essenceField.embed({
  width: 1024
}) %}
```

#### Service

You can just use basic text fields, which won’t get validated when saving an entry, or other URL text values. To do so just use the `craft.essence.embed` service method.

```jinja
{% set url = 'http://vimeo.com/104385049' %}

{% set media = craft.essence.embed(url, {
  customParameter: 1234
}) %}

{% if media %}
  {{ media }}
{% endif %}
```

#### Providers

Supports the follow providers made available in [felixgirault/essence](https://github.com/felixgirault/essence).

```html
23hq                    Coub           Hulu          PollEverywhere   Spotify
Animoto                 CrowdRanking   Ifixit        Prezi            TedOEmbed
Aol                     DailyMile      Ifttt         Qik              TedOpenGraph
App.net                 Dailymotion    Imgur         Rdio             Twitter
Bambuser                Deviantart     Instagram     Revision3        Ustream
Bandcamp                Dipity         Jest          Roomshare        Vhx
Blip.tv                 Dotsub         Justin.tv     Sapo             Viddler
Cacoo                   Edocr          Kickstarter   Screenr          Videojug
CanalPlus               Flickr         Meetup        Scribd           Vimeo
Chirb.it                FunnyOrDie     Mixcloud      Shoudio          Vine
CircuitLab              Gist           Mobypicture   Sketchfab        Wistia
Clikthrough             Gmep           Nfb           SlideShare       WordPress
CollegeHumorOEmbed      HowCast        Official.fm   SoundCloud       Yfrog
CollegeHumorOpenGraph   Huffduffer     Polldaddy     SpeakerDeck      Youtube
```
