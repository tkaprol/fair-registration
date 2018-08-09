
/**
 * Expo List Item View
 * The DOM element for an item in a list of expo items.
 */

var ExpoListItemView = Backbone.View.extend({

  initialize: function(options) {
    this.marker_view = options.marker_view; //retain instance of google marker
    this.model.on('remove', this.remove, this); //subscribe to remove events on model
    this.render();
  },

  //----------------------------------
  // Events and event handlers

  events: {
  },

  show_expo_detail : function() {
    App.show_content();
  },

  // END Events and event handlers
  //----------------------------------

});
