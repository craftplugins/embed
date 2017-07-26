/**
 * Embed plugin for Craft CMS
 *
 * EmbedFieldType JS
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   Embed
 * @since     0.1.0
 */

(function($, window, document, undefined) {

  $('.embed-field').each(function() {
  	var $field = $(this);
    var $input = $field.find('.embed-field__input');
    var $spinner = $field.find('.embed-field__spinner');
    var $media = $field.find('.embed-field__media');

    var value = $input.val();

    $input.on('change paste', function() {
      if ($input.val() != value) {
        value = $input.val();
        setTimeout(function() {
          var actionUrl = Craft.getActionUrl('embed/extract', {
            url: $input.val()
          });

          $spinner.removeClass('hidden');

          $.ajax(actionUrl)
            .done(function(data) {
              $media.html(data);
            })
            .fail(function() {
              $media.empty();
            })
            .always(function() {
              $spinner.addClass('hidden');
            });
        }, 10);
      }
    });
  });

})(window.jQuery, window, document);
