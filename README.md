# Craft Essence

A plugin for [Craft](http://craftcms.com) that extracts media information from URLs using OEmbed and OpenGraph. It’s based on the very well built [felixgirault/essence](https://github.com/felixgirault/essence).

## Installation

To install Sanction, copy the `essence/` folder into `craft/plugins/`, and then go to Settings > Plugins and click the “Install” button next to “Essence”.

## Usage

#### Fields

Essence comes with a field that validates input when saving en entry. This saves some logic in templates and helps prevent content editors getting confused when nothing appears on the front-end.

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

You can just use basic text fields, which won’t get validated when saving an entry. To do so just use the `craft.essence.embed` service method.

```jinja
{% set url = 'http://vimeo.com/104385049' %}

{% set media = craft.essence.embed(url, {
  customParameter: 1234
}) %}

{% if media %}
  {{ media }}
{% endif %}
```
