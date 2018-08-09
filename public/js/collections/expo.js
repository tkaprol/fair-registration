
/**
 * Expo Collection
 */

var ExpoList = Backbone.Collection.extend({

  // reference to this collection's model.
  model: Expo,
  url: '/json/expos/',
  initialize: function() {
      this.fetch();
  },


  add_new: function(expo) {
    this.create(expo);
  },

  // expos are sorted by their name
  comparator: function(expo) {
    return expo.get('name');
  },

  remove_all: function() {
    var model;
    while (model = this.pop()) {
      model.destroy();
    }
  }
});
