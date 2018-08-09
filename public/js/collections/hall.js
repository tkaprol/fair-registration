
/**
 * Hall Collection
 */

var HallList = Backbone.Collection.extend({

  // reference to this collection's model.
  model: Hall,
  url: '/json/halls/' + $('#id').val(),
  initialize: function() {
      this.fetch();
  },

  add_new: function(hall) {
    this.create(hall);
  },


  remove_all: function() {
    var model;
    while (model = this.pop()) {
      model.destroy();
    }
  }
});
